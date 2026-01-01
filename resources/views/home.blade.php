@extends('layouts.app')

@section('content')
<section id="hero" class="relative min-h-[90vh] flex items-center bg-white overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-blue-50 via-white to-indigo-50 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
        <div class="text-left py-10">
            <div class="inline-flex items-center px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-bold mb-6 border border-blue-200">
                <span class="flex h-2 w-2 relative mr-2">
                  <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75"></span>
                  <span class="relative inline-flex rounded-full h-2 w-2 bg-blue-500"></span>
                </span>
                #1 Platform Anak Rantau
            </div>
            
            <h1 class="text-4xl md:text-6xl font-extrabold text-slate-900 mb-6 flex flex-col gap-2 md:gap-4 leading-tight">
                <span>
                    Cari Kos <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-indigo-600">Nyaman</span>,
                </span>
                <span>
                    Hidup Lebih Aman.
                </span>
            </h1>
            
            <p class="text-lg text-slate-500 mb-8 leading-relaxed max-w-lg">
                Gak perlu lagi keliling panas-panasan. Cukup scroll, booking, dan langsung pindahan.
            </p>
            
            <form action="{{ route('kosts.index') }}" method="GET" class="bg-white p-2 rounded-full shadow-xl border border-gray-100 flex items-center max-w-md w-full relative z-20">
                <div class="pl-6 flex-1">
                    <input type="text" name="keyword" placeholder="Mau cari kos di daerah mana?" class="w-full text-sm outline-none text-gray-700 placeholder-gray-400 bg-transparent">
                </div>
                <button type="submit" class="bg-slate-900 text-white rounded-full px-6 py-3 font-bold text-sm hover:bg-blue-700 transition shadow-md hover:shadow-blue-500/30">
                    Cari
                </button>
            </form>
        </div>

        <div class="hidden md:block relative">
            <div class="absolute top-0 right-0 -mr-20 -mt-20 w-72 h-72 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob"></div>
            <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-72 h-72 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
            <img src="https://images.unsplash.com/photo-1505691938895-1758d7feb511?q=80&w=2070&auto=format&fit=crop" class="relative rounded-3xl shadow-2xl transform rotate-2 hover:rotate-0 transition duration-500 border-4 border-white" alt="Ilustrasi Kos">
        </div>
    </div>
</section>

<section id="rekomendasi" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-bold text-slate-900">Rekomendasi Kos</h2>
                <p class="text-slate-500 mt-2">Pilihan favorit di daerahmu (Random Picks).</p>
            </div>
            <a href="{{ route('kosts.index') }}" class="text-blue-600 font-bold text-sm hover:underline">Lihat Semua <i class="fa-solid fa-arrow-right ml-1"></i></a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($kosts as $kost)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-2xl hover:-translate-y-1 transition duration-300 overflow-hidden border border-gray-100 group flex flex-col h-full">
                <div class="relative h-56 overflow-hidden flex-shrink-0">
                    <img src="{{ $kost->gambar_url }}" class="w-full h-full object-cover transform group-hover:scale-110 transition duration-700">
                    
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider text-slate-800 shadow-sm">
                        {{ $kost->tipe }}
                    </div>

                    <div class="absolute top-4 right-4 bg-slate-900/80 backdrop-blur px-2 py-1 rounded-lg text-xs font-bold text-yellow-400 shadow-sm flex items-center gap-1">
                        <i class="fa-solid fa-star"></i>
                        <span>{{ $kost->rating }}</span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="flex-1">
                        <h3 class="text-lg font-bold text-slate-900 line-clamp-1 mb-2">{{ $kost->nama_kost }}</h3>
                        <p class="text-slate-500 text-sm mb-4 flex items-center">
                            <i class="fa-solid fa-location-dot text-red-500 mr-2"></i> {{ $kost->lokasi }}
                        </p>
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach(array_slice(explode(',', $kost->fasilitas), 0, 3) as $fasilitas)
                                <span class="text-[10px] bg-slate-100 text-slate-600 px-2 py-1 rounded border border-slate-200">{{ $fasilitas }}</span>
                            @endforeach
                            @if(count(explode(',', $kost->fasilitas)) > 3)
                                <span class="text-[10px] bg-slate-100 text-slate-600 px-2 py-1 rounded border border-slate-200">+{{ count(explode(',', $kost->fasilitas)) - 3 }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="flex justify-between items-center border-t border-slate-100 pt-4 mt-auto">
                        <div>
                            <div class="text-lg font-bold text-blue-600">Rp {{ number_format($kost->harga, 0, ',', '.') }}</div>
                            <div class="text-xs text-slate-400">/ bulan</div>
                        </div>
                        
                        <a href="{{ route('kosts.show', $kost->id) }}" class="bg-slate-900 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-lg transform hover:-translate-y-0.5 hover:shadow-blue-500/30">
                            Lihat
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section id="keunggulan" class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900">Kenapa SobatKos?</h2>
            <p class="text-slate-500 mt-2">Beda dari yang lain, kami mengerti kebutuhanmu.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-3xl bg-slate-50 hover:bg-white hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100 text-center group">
                <div class="w-16 h-16 mx-auto bg-blue-100 text-blue-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-tag"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Harga Jujur</h3>
                <p class="text-slate-500 text-sm">Tidak ada biaya admin tersembunyi. Bayar sesuai harga tertera.</p>
            </div>
            <div class="p-8 rounded-3xl bg-slate-50 hover:bg-white hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100 text-center group">
                <div class="w-16 h-16 mx-auto bg-indigo-100 text-indigo-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Terverifikasi</h3>
                <p class="text-slate-500 text-sm">Semua kos sudah disurvey langsung oleh tim kami. Anti zonk.</p>
            </div>
            <div class="p-8 rounded-3xl bg-slate-50 hover:bg-white hover:shadow-xl transition duration-300 border border-transparent hover:border-gray-100 text-center group">
                <div class="w-16 h-16 mx-auto bg-green-100 text-green-600 rounded-2xl flex items-center justify-center text-2xl mb-6 group-hover:scale-110 transition">
                    <i class="fa-solid fa-bolt"></i>
                </div>
                <h3 class="text-xl font-bold text-slate-800 mb-3">Booking Cepat</h3>
                <p class="text-slate-500 text-sm">Proses booking sat-set, pembayaran otomatis, langsung konfirmasi.</p>
            </div>
        </div>
    </div>
</section>

<section id="testimoni" class="py-20 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-bold text-slate-900">Kata Anak Rantau</h2>
            <p class="text-slate-500 mt-2">Mereka yang sudah menemukan hunian nyaman.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <img src="https://randomuser.me/api/portraits/women/44.jpg" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-slate-900">Sarah Putri</h4>
                        <p class="text-xs text-slate-500">Mahasiswi UNPAD</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-sm mb-3">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 text-sm">"Pas sampai kosannya persis banget sama di foto. Adminnya gercep!"</p>
            </div>
            <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-slate-900">Dimas Anggara</h4>
                        <p class="text-xs text-slate-500">Karyawan</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-sm mb-3">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star-half-stroke"></i>
                </div>
                <p class="text-slate-600 text-sm">"Fitur filternya ngebantu banget buat nyari kos yang ada parkir mobilnya."</p>
            </div>
            <div class="p-8 rounded-2xl bg-white border border-slate-100 shadow-sm">
                <div class="flex items-center gap-4 mb-4">
                    <img src="https://randomuser.me/api/portraits/women/65.jpg" class="w-12 h-12 rounded-full object-cover">
                    <div>
                        <h4 class="font-bold text-slate-900">Rina Wati</h4>
                        <p class="text-xs text-slate-500">Mahasiswi ITB</p>
                    </div>
                </div>
                <div class="text-yellow-400 text-sm mb-3">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <p class="text-slate-600 text-sm">"SobatKos penyelamat banget pas ospek dadakan butuh kosan harian."</p>
            </div>
        </div>
    </div>
</section>

@endsection