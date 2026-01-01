@extends('layouts.app')

@section('content')
<div class="min-h-[calc(100vh-5rem)] bg-slate-50 flex items-center justify-center px-4 py-10">
    <div class="max-w-md w-full bg-white rounded-3xl shadow-xl overflow-hidden border border-gray-100 text-center p-8">
        
        <div class="mb-6">
            <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-2 animate-bounce">
                <i class="fa-solid fa-check text-5xl text-green-500"></i>
            </div>
            <h2 class="text-2xl font-bold text-slate-900">Pembayaran Berhasil!</h2>
        </div>

        <p class="text-slate-500 mb-8 text-sm leading-relaxed">
            Terima kasih! Bukti pembayaranmu untuk <span class="font-bold text-slate-800">{{ $booking->nama_kost }}</span> sudah kami terima.
        </p>

        <div class="bg-slate-50 rounded-xl p-5 mb-8 text-left border border-slate-100 relative">
            <div class="absolute -top-1 left-0 w-full h-2 bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMCAxMCIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+PHBhdGggZD0iTTAgMTBMMTAgMEwyMCAxMEgwWiIgZmlsbD0iI2Y4ZmFmYyIvPjwvc3ZnPg==')] bg-contain"></div>
            
            <div class="flex justify-between mb-3 border-b border-dashed border-slate-200 pb-3">
                <span class="text-slate-500 text-xs">ID Invoice</span>
                <span class="font-mono font-bold text-slate-800 text-sm">#INV-{{ $booking->id }}</span>
            </div>
            <div class="flex justify-between mb-3">
                <span class="text-slate-500 text-xs">Total Bayar</span>
                <span class="font-bold text-blue-600 text-sm">Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between">
                <span class="text-slate-500 text-xs">Waktu</span>
                <span class="text-slate-800 text-xs font-medium">{{ \Carbon\Carbon::parse($booking->updated_at)->format('d M Y, H:i') }}</span>
            </div>
        </div>

        <div class="space-y-3">
            
            <a href="{{ route('bookings.history') }}" 
               class="flex items-center justify-center w-full py-3.5 rounded-xl bg-slate-900 text-white font-bold border-2 border-transparent hover:bg-blue-700 hover:shadow-blue-500/30 transition shadow-lg transform hover:-translate-y-0.5 text-sm gap-2">
                Lihat Riwayat Booking <i class="fa-solid fa-arrow-right"></i>
            </a>

            <a href="{{ route('home') }}" 
               class="flex items-center justify-center w-full py-3.5 rounded-xl border-2 border-slate-200 text-slate-500 font-bold hover:bg-slate-50 hover:text-slate-800 hover:border-slate-300 transition shadow-sm text-sm gap-2">
                <i class="fa-solid fa-house"></i> Kembali ke Beranda
            </a>

        </div>

    </div>
</div>
@endsection