<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    // 1. Home / Landing Page (SUDAH DIPERBAIKI: RANDOM 3 ITEM)
    public function index()
    {
        // Mengambil 3 kos secara ACAK untuk rekomendasi
        $kosts = DB::table('kosts')
                    ->inRandomOrder()
                    ->take(3)
                    ->get();
                    
        return view('home', compact('kosts'));
    }

    // 2. Detail Kost
    public function show($id)
    {
        $kost = DB::table('kosts')->where('id', $id)->first();
        if (!$kost) abort(404);
        
        // Debugging (Opsional): Hapus // di bawah jika rating masih error
        // dd($kost); 
        
        return view('kosts.show', compact('kost'));
    }

    // 3. Form Booking
    public function create($id)
    {
        $kost = DB::table('kosts')->where('id', $id)->first();
        return view('bookings.create', compact('kost'));
    }

    // 4. Proses Simpan Booking
    public function store(Request $request)
    {
        $request->validate([
            'kost_id' => 'required|exists:kosts,id',
            'nama_penyewa' => 'required|string|max:255',
            'no_hp' => 'required|string|max:20',
            'tanggal_mulai' => 'required|date',
            'durasi' => 'required|integer|min:1',
        ]);

        $kost = DB::table('kosts')->where('id', $request->kost_id)->first();
        $total_harga = $kost->harga * $request->durasi;

        $bookingId = DB::table('bookings')->insertGetId([
            'kost_id' => $request->kost_id,
            'nama_penyewa' => $request->nama_penyewa,
            'no_hp' => $request->no_hp,
            'tanggal_mulai' => $request->tanggal_mulai,
            'durasi' => $request->durasi,
            'total_harga' => $total_harga,
            'status' => 'Pending',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('bookings.payment', $bookingId);
    }

    // 5. Halaman Pembayaran
    public function payment($id)
    {
        $booking = DB::table('bookings')
            ->join('kosts', 'bookings.kost_id', '=', 'kosts.id')
            ->select('bookings.*', 'kosts.nama_kost', 'kosts.lokasi')
            ->where('bookings.id', $id)
            ->first();

        if (!$booking) abort(404);

        return view('bookings.payment', compact('booking'));
    }

    // 6. Proses Upload Bukti Bayar
    public function processPayment(Request $request, $id)
    {
        $request->validate([
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg|max:10240',
        ]);

        if ($request->hasFile('bukti_bayar')) {
            $path = $request->file('bukti_bayar')->store('uploads', 'public');

            DB::table('bookings')->where('id', $id)->update([
                'bukti_bayar' => 'storage/' . $path,
                'status' => 'Lunas', 
                'updated_at' => now(),
            ]);

            return redirect()->route('bookings.success', $id);
        }

        return back()->withErrors(['bukti_bayar' => 'Gagal mengupload file. Silakan coba lagi.']);
    }

    // 7. Halaman Sukses
    public function success($id)
    {
        $booking = DB::table('bookings')
            ->join('kosts', 'bookings.kost_id', '=', 'kosts.id')
            ->select('bookings.*', 'kosts.nama_kost', 'kosts.lokasi')
            ->where('bookings.id', $id)
            ->first();

        if (!$booking) abort(404);

        return view('bookings.success', compact('booking'));
    }


    // 8. Halaman Katalog / Cari Kost
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $query = DB::table('kosts');

        if ($keyword) {
            $query->where('nama_kost', 'like', "%{$keyword}%")
                  ->orWhere('lokasi', 'like', "%{$keyword}%")
                  ->orWhere('alamat_lengkap', 'like', "%{$keyword}%");
        }

        $kosts = $query->orderByDesc('created_at')->paginate(9);
        $kosts->appends(['keyword' => $keyword]);

        return view('kosts.index', compact('kosts', 'keyword'));
    }
}