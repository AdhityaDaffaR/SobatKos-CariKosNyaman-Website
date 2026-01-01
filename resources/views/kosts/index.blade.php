@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-slate-50 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <div class="mb-10 text-center max-w-2xl mx-auto">
            <h1 class="text-3xl font-bold text-slate-900 mb-4">Temukan Kos Impianmu</h1>
            <p class="text-slate-500 mb-8">Cari berdasarkan nama, lokasi, atau alamat.</p>
            
            <form action="{{ route('kosts.index') }}" method="GET" class="relative">
                <input type="text" 
                       name="keyword" 
                       value="{{ $keyword ?? '' }}"
                       placeholder="Ketik 'Dago', 'Cimahi', atau 'Putri'..." 
                       class="w-full pl-12 pr-4 py-4 rounded-full border border-slate-200 shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 outline-none transition text-slate-700">
                
                <i class="fa-solid fa-magnifying-glass absolute left-5 top-1/2 transform -translate-y-1/2 text-slate-400 text-lg"></i>
                
                <button type="submit" class="absolute right-2 top-2 bottom-2 bg-slate-900 text-white px-6 rounded-full font-bold hover:bg-blue-700 transition shadow-md hover:shadow-blue-500/30">
                    Cari
                </button>
            </form>
        </div>

        @if($kosts->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-12">
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
                        <div class="mb-4 flex-1">
                            <h3 class="text-lg font-bold text-slate-900 line-clamp-1 mb-1 group-hover:text-blue-600 transition">{{ $kost->nama_kost }}</h3>
                            <p class="text-slate-500 text-sm flex items-center mb-3">
                                <i class="fa-solid fa-location-dot text-red-500 mr-2"></i> {{ $kost->lokasi }}
                            </p>
                            <div class="flex flex-wrap gap-2">
                                @foreach(array_slice(explode(',', $kost->fasilitas), 0, 3) as $fasilitas)
                                    <span class="text-[10px] bg-slate-100 text-slate-600 px-2 py-1 rounded border border-slate-200">{{ $fasilitas }}</span>
                                @endforeach
                                @if(count(explode(',', $kost->fasilitas)) > 3)
                                    <span class="text-[10px] bg-slate-100 text-slate-600 px-2 py-1 rounded border border-slate-200">+{{ count(explode(',', $kost->fasilitas)) - 3 }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="border-t border-slate-100 pt-4 flex justify-between items-center mt-auto">
                            <div>
                                <div class="text-lg font-bold text-blue-600">Rp {{ number_format($kost->harga, 0, ',', '.') }}</div>
                                <div class="text-xs text-slate-400">/ bulan</div>
                            </div>
                            
                            <a href="{{ route('kosts.show', $kost->id) }}" class="bg-slate-900 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-blue-700 transition shadow-lg hover:shadow-blue-500/30 transform hover:-translate-y-0.5">
                                Lihat
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8 flex justify-center">
                {{ $kosts->links('pagination::tailwind') }}
            </div>

        @else
            <div class="text-center py-20">
                <div class="w-24 h-24 bg-slate-100 rounded-full flex items-center justify-center mx-auto mb-6">
                    <i class="fa-solid fa-face-frown-open text-4xl text-slate-400"></i>
                </div>
                <h3 class="text-2xl font-bold text-slate-800 mb-2">Yah, Kos tidak ditemukan</h3>
                <p class="text-slate-500">Coba gunakan kata kunci lain seperti "Dago" atau "Putri".</p>
                
                <a href="{{ route('kosts.index') }}" class="inline-block mt-6 bg-slate-900 text-white px-8 py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg hover:shadow-blue-500/30 transform hover:-translate-y-0.5">
                    Lihat Semua Kos
                </a>
            </div>
        @endif

    </div>
</div>
@endsection