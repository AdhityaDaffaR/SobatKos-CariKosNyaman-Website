@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 pb-20">
    
    <div class="relative h-[400px] md:h-[500px] w-full overflow-hidden group">
        <img src="{{ $kost->gambar_url }}" class="w-full h-full object-cover transform group-hover:scale-105 transition duration-700">
        
        <div class="absolute inset-0 bg-black/25 transition duration-700"></div>
        
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent"></div>
        
        <div class="absolute top-6 left-4 md:left-8 z-10">
            <a href="{{ route('home') }}" class="bg-white/20 backdrop-blur-md hover:bg-white text-white hover:text-slate-900 px-4 py-2 rounded-full font-bold text-sm transition flex items-center gap-2">
                <i class="fa-solid fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="absolute bottom-10 left-0 w-full p-4 md:p-8 text-white">
            <div class="max-w-7xl mx-auto">
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
                    <div>
                        <span class="bg-blue-600 text-white text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3 inline-block shadow-lg">
                            {{ $kost->tipe }}
                        </span>
                        <h1 class="text-3xl md:text-5xl font-bold mb-2 shadow-sm">{{ $kost->nama_kost }}</h1>
                        <p class="text-slate-200 text-sm md:text-base flex items-center gap-2">
                            <i class="fa-solid fa-location-dot text-red-400"></i> {{ $kost->alamat_lengkap }}
                        </p>
                    </div>
                    
                    <div class="flex items-center gap-3 bg-white/10 backdrop-blur-md p-3 rounded-xl border border-white/20">
                        <div class="text-center">
                            <div class="text-yellow-400 text-2xl font-bold flex items-center gap-1">
                                {{ $kost->rating }} <i class="fa-solid fa-star text-lg"></i>
                            </div>
                            <div class="text-slate-200 text-xs">dari 5.0</div>
                        </div>
                        <div class="h-8 w-px bg-white/20"></div>
                        <div class="text-white text-xs text-right">
                            <div class="font-bold">Nyaman</div>
                            <div>Terverifikasi</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-2 space-y-8">
                
                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-4 flex items-center gap-2">
                        <i class="fa-solid fa-align-left text-blue-600"></i> Deskripsi
                    </h3>
                    <p class="text-slate-600 leading-relaxed text-sm md:text-base">
                        {{ $kost->deskripsi }}
                    </p>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
                    <h3 class="text-xl font-bold text-slate-900 mb-6 flex items-center gap-2">
                        <i class="fa-solid fa-list-check text-blue-600"></i> Fasilitas
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach(explode(',', $kost->fasilitas) as $fasilitas)
                        <div class="flex items-center gap-3 p-3 rounded-xl bg-slate-50 border border-slate-100 text-slate-700 text-sm font-medium hover:bg-blue-50 hover:border-blue-100 hover:text-blue-700 transition cursor-default group">
                            <span class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-blue-500 shadow-sm group-hover:scale-110 transition">
                                <i class="fa-solid fa-check"></i>
                            </span>
                            {{ trim($fasilitas) }}
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="bg-white rounded-3xl p-6 md:p-8 shadow-sm border border-slate-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-xl font-bold text-slate-900 flex items-center gap-2">
                            <i class="fa-solid fa-map-location-dot text-blue-600"></i> Lokasi
                        </h3>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($kost->alamat_lengkap) }}" target="_blank" class="text-sm font-bold text-blue-600 hover:text-blue-800 transition flex items-center gap-1">
                            Buka di Maps <i class="fa-solid fa-arrow-up-right-from-square text-xs"></i>
                        </a>
                    </div>

                    <div class="native-cursor-area w-full h-72 bg-slate-200 rounded-2xl overflow-hidden shadow-inner relative z-0">
                        <iframe 
                            class="w-full h-full"
                            frameborder="0" 
                            scrolling="no" 
                            marginheight="0" 
                            marginwidth="0" 
                            src="https://maps.google.com/maps?q={{ urlencode($kost->alamat_lengkap) }}&t=&z=15&ie=UTF8&iwloc=&output=embed">
                        </iframe>
                    </div>
                    
                    <div class="mt-4 flex items-start gap-3 bg-slate-50 p-4 rounded-xl border border-slate-100">
                        <i class="fa-solid fa-location-dot text-red-500 mt-1 text-lg"></i>
                        <div>
                            <p class="font-bold text-slate-900 text-sm">Alamat Lengkap</p>
                            <p class="text-slate-600 text-sm leading-relaxed">{{ $kost->alamat_lengkap }}</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="lg:col-span-1">
                <div class="sticky top-24 space-y-6">
                    
                    <div class="bg-white rounded-3xl p-6 shadow-xl border border-blue-100 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-full -mr-16 -mt-16 z-0"></div>
                        
                        <div class="relative z-10">
                            <p class="text-slate-500 text-sm mb-1">Harga Sewa</p>
                            <div class="flex items-end gap-1 mb-6">
                                <span class="text-3xl font-bold text-slate-900">Rp {{ number_format($kost->harga, 0, ',', '.') }}</span>
                                <span class="text-slate-500 mb-1">/ bulan</span>
                            </div>

                            <a href="{{ route('bookings.create', $kost->id) }}" class="h-12 w-full bg-slate-900 text-white flex items-center justify-center rounded-xl font-bold text-sm hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition transform hover:-translate-y-0.5 duration-200">
                                Ajukan Sewa
                            </a>

                            <p class="text-center text-xs text-slate-400 mt-3">
                                <i class="fa-solid fa-shield-halved mr-1"></i> Transaksi Aman via SobatKos
                            </p>
                        </div>
                    </div>

                    <div class="bg-white rounded-3xl p-6 shadow-sm border border-slate-100 flex items-center gap-4">
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center text-blue-600 text-xl font-bold border-2 border-white shadow-sm">
                            {{ substr($kost->nama_pemilik, 0, 1) }}
                        </div>
                        <div class="flex-1">
                            <p class="text-xs text-slate-500 uppercase tracking-wide">Pemilik Kost</p>
                            <h4 class="font-bold text-slate-900">{{ $kost->nama_pemilik }}</h4>
                            <div class="flex items-center gap-1 text-xs text-green-600 font-medium">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span> Online
                            </div>
                        </div>
                        
                        @php
                            // Dummy Number Logic
                            $waNumber = '6280000000000';
                        @endphp
                        <a href="https://wa.me/{{ $waNumber }}?text=Halo%20{{ $kost->nama_pemilik }},%20saya%20tertarik%20dengan%20{{ $kost->nama_kost }}" target="_blank" class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center hover:bg-green-600 hover:text-white transition shadow-sm" title="Chat WhatsApp">
                            <i class="fa-brands fa-whatsapp text-xl"></i>
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="fixed bottom-0 left-0 w-full bg-white border-t border-slate-200 p-4 md:hidden z-50 flex justify-between items-center shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
    <div>
        <p class="text-xs text-slate-500">Harga per bulan</p>
        <p class="text-lg font-bold text-blue-600">Rp {{ number_format($kost->harga, 0, ',', '.') }}</p>
    </div>
    
    <a href="{{ route('bookings.create', $kost->id) }}" class="h-12 flex items-center justify-center bg-slate-900 text-white px-8 rounded-xl font-bold text-sm hover:bg-blue-700 hover:shadow-lg hover:shadow-blue-500/30 transition transform hover:-translate-y-0.5">
        Sewa
    </a>
</div>
@endsection