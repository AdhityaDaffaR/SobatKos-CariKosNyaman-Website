@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-50 py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            <div class="lg:sticky lg:top-24 h-fit">
                <h2 class="text-3xl font-bold text-gray-900 mb-6">Selesaikan Booking</h2>
                <div class="bg-white rounded-3xl shadow-lg overflow-hidden border border-gray-100">
                    <img src="{{ $kost->gambar_url }}" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $kost->nama_kost }}</h3>
                        <p class="text-gray-500 mb-4"><i class="fas fa-map-marker-alt text-red-500 mr-2"></i>{{ $kost->lokasi }}</p>
                        <div class="border-t border-dashed border-gray-200 my-4"></div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Harga per bulan</span>
                            <span class="font-bold text-gray-900" id="base-price" data-price="{{ $kost->harga }}">Rp {{ number_format($kost->harga, 0, ',', '.') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <div class="bg-white rounded-3xl shadow-xl p-8 border border-gray-100 relative">
                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="kost_id" value="{{ $kost->id }}">
                        
                        <div class="mb-6">
                            <h3 class="text-xl font-bold text-gray-900">Data Penyewa</h3>
                            <p class="text-sm text-gray-400">Pastikan data kamu sesuai KTP.</p>
                        </div>
                        
                        <div class="space-y-5">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" name="nama_penyewa" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition bg-gray-50">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor WhatsApp</label>
                                <input type="number" name="no_hp" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition bg-gray-50">
                            </div>

                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition bg-gray-50">
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Durasi (Bulan)</label>
                                    <input type="number" id="duration" name="durasi" value="1" min="1" required class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition bg-gray-50">
                                </div>
                            </div>
                        </div>

                        <div class="mt-8 pt-6 border-t border-gray-100">
                            <div class="flex justify-between items-center mb-6">
                                <span class="text-lg font-medium text-gray-600">Total Pembayaran</span>
                                <span class="text-2xl font-bold text-indigo-700" id="total-price">Rp {{ number_format($kost->harga, 0, ',', '.') }}</span>
                            </div>
                            
                            <div class="flex gap-4">
                                
                                <a href="{{ route('kosts.show', $kost->id) }}" 
                                   class="flex-1 h-12 rounded-xl border-2 border-red-100 text-red-500 bg-white font-bold text-sm hover:bg-red-50 hover:text-red-600 hover:border-red-200 transition shadow-sm transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    <i class="fa-solid fa-xmark"></i> Batal
                                </a>
                                
                                <button type="submit" 
                                        class="flex-1 h-12 rounded-xl bg-slate-900 text-white font-bold text-sm border-2 border-transparent hover:bg-blue-700 hover:shadow-blue-500/30 transition shadow-lg transform hover:-translate-y-0.5 flex items-center justify-center gap-2">
                                    Lanjut Bayar <i class="fa-solid fa-arrow-right"></i>
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const durationInput = document.getElementById('duration');
    const basePrice = parseFloat(document.getElementById('base-price').dataset.price);
    const totalPriceDisplay = document.getElementById('total-price');

    durationInput.addEventListener('input', function() {
        const duration = parseInt(this.value) || 1;
        const total = basePrice * duration;
        totalPriceDisplay.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
    });
</script>
@endsection