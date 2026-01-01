<!DOCTYPE html>
<html lang="id" class="scroll-smooth"> <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SobatKos - Cari Kos Nyaman</title>

    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 64 64%22><defs><linearGradient id=%22a%22 x1=%220%25%22 y1=%220%25%22 x2=%22100%25%22 y2=%22100%25%22><stop offset=%220%25%22 stop-color=%22%232563eb%22/><stop offset=%22100%25%22 stop-color=%22%234338ca%22/></linearGradient></defs><rect width=%2264%22 height=%2264%22 rx=%2216%22 fill=%22url(%23a)%22/><text x=%2250%25%22 y=%2250%25%22 font-family=%22sans-serif%22 font-size=%2240%22 font-weight=%22bold%22 fill=%22%23fff%22 text-anchor=%22middle%22 dominant-baseline=%22central%22>S</text></svg>" type="image/svg+xml">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; }
        
        
        /* Navbar Glass Effect */
        .glass-nav {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }

        
    </style>
</head>
<body class="bg-slate-50 text-gray-800 antialiased">

    <nav class="fixed top-0 w-full z-50 glass-nav h-20 flex items-center transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
            <div class="flex justify-between items-center h-full">
                
                <a href="{{ route('home') }}" class="flex items-center gap-2 group">
                    <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-blue-600 to-indigo-700 flex items-center justify-center text-white font-bold text-xl shadow-lg transition-all duration-300 ease-out group-hover:scale-110 group-hover:rotate-12">
                        <span class="transition-transform duration-300 group-hover:-rotate-12">S</span>
                    </div>
                    <span class="font-bold text-2xl tracking-tight text-slate-800">Sobat<span class="text-blue-600">Kos</span></span>
                </a>
                
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}#hero" class="text-gray-600 hover:text-blue-600 font-medium transition text-sm">Beranda</a>
                    <a href="{{ route('home') }}#rekomendasi" class="text-gray-600 hover:text-blue-600 font-medium transition text-sm">Rekomendasi</a>
                    <a href="{{ route('home') }}#keunggulan" class="text-gray-600 hover:text-blue-600 font-medium transition text-sm">Keunggulan</a>
                    <a href="{{ route('home') }}#testimoni" class="text-gray-600 hover:text-blue-600 font-medium transition text-sm">Testimoni</a>
                </div>

                <div class="hidden md:flex items-center gap-4">
                    <a href="{{ route('bookings.history') }}" class="text-gray-600 hover:text-blue-600 font-medium text-sm"><i class="fa-solid fa-clock-rotate-left mr-1"></i> Riwayat</a>
                    <a href="#" class="px-5 py-2.5 rounded-full bg-slate-900 text-white font-semibold text-sm hover:bg-blue-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">Masuk</a>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-btn" class="text-slate-800 focus:outline-none p-2 transition-transform duration-300"><i id="menu-icon" class="fa-solid fa-bars text-2xl"></i></button>
                </div>
            </div>
        </div>

        <div id="mobile-menu" class="absolute top-20 left-0 w-full bg-white/95 backdrop-blur-md border-b border-gray-100 shadow-xl md:hidden overflow-hidden transition-all duration-500 ease-in-out max-h-0 opacity-0">
            <div class="flex flex-col p-6 space-y-6 text-center">
                <a href="{{ route('home') }}#hero" class="block text-gray-600 hover:text-blue-600 font-medium text-lg mobile-link">Beranda</a>
                <a href="{{ route('home') }}#rekomendasi" class="block text-gray-600 hover:text-blue-600 font-medium text-lg mobile-link">Rekomendasi</a>
                <a href="{{ route('home') }}#keunggulan" class="block text-gray-600 hover:text-blue-600 font-medium text-lg mobile-link">Keunggulan</a>
                <a href="{{ route('home') }}#testimoni" class="block text-gray-600 hover:text-blue-600 font-medium text-lg mobile-link">Testimoni</a>
                <a href="{{ route('bookings.history') }}" class="block text-gray-600 hover:text-blue-600 font-medium text-lg mobile-link">Riwayat Booking</a>
                <a href="#" class="block w-full bg-slate-900 text-white font-bold py-3.5 rounded-xl hover:bg-blue-700 transition shadow-lg mobile-link">Masuk</a>
            </div>
        </div>
    </nav>

    <main class="pt-20">@yield('content')</main>

    <footer class="bg-slate-900 text-white pt-16 pb-8 border-t border-slate-800 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-8 mb-12">
            <div class="lg:col-span-4">
                <div class="flex items-center gap-2 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-blue-600 flex items-center justify-center text-white font-bold">S</div><span class="font-bold text-xl">SobatKos</span>
                </div>
                <p class="text-slate-400 text-sm leading-relaxed mb-6 pr-4">Teman setia anak rantau. Cari kos nyaman, aman, dan murah semudah scrolling medsos.</p>
                <div class="flex space-x-3">
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-600 transition text-white border border-slate-700 hover:border-blue-600"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-500 transition text-white border border-slate-700 hover:border-blue-500"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="w-10 h-10 rounded-full bg-slate-800 flex items-center justify-center hover:bg-blue-700 transition text-white border border-slate-700 hover:border-blue-700"><i class="fa-brands fa-facebook-f"></i></a>
                </div>
            </div>
            <div class="lg:col-span-2">
                <h4 class="text-lg font-bold mb-4 text-white">Navigasi</h4>
                <ul class="space-y-2 text-slate-400 text-sm">
                    <li><a href="{{ route('home') }}" class="hover:text-blue-400 transition">Beranda</a></li>
                    <li><a href="{{ route('kosts.index') }}" class="hover:text-blue-400 transition">Cari Kos</a></li>
                    <li><a href="{{ route('home') }}#keunggulan" class="hover:text-blue-400 transition">Keunggulan</a></li>
                    <li><a href="{{ route('home') }}#testimoni" class="hover:text-blue-400 transition">Testimoni</a></li>
                </ul>
            </div>
            <div class="lg:col-span-3">
                <h4 class="text-lg font-bold mb-4 text-white">Hubungi Kami</h4>
                <ul class="space-y-3 text-slate-400 text-sm">
                    <li class="flex items-center gap-3"><i class="fa-brands fa-whatsapp w-5 text-green-500"></i> +62 812-3456-7890</li>
                    <li class="flex items-center gap-3"><i class="fa-regular fa-envelope w-5 text-blue-400"></i> help@sobatkos.com</li>
                    <li class="flex items-center gap-3"><i class="fa-solid fa-location-dot w-5 text-red-500"></i> Sumedang, Jawa Barat</li>
                </ul>
            </div>
            <div class="lg:col-span-3">
                <h4 class="text-lg font-bold mb-4 text-white">Info Kos Terbaru</h4>
                <p class="text-slate-400 text-sm mb-4">Mau dapat info diskon kos? Masukkan emailmu di sini.</p>
                <form action="#" class="space-y-2">
                    <input type="email" placeholder="Email kamu..." class="w-full bg-slate-800 border border-slate-700 text-white px-4 py-3 rounded-xl focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 text-sm placeholder-slate-500">
                    <button type="button" class="w-full bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-900/20 text-sm">Berlangganan</button>
                </form>
            </div>
        </div>
        <div class="border-t border-slate-800 pt-8 text-center text-slate-500 text-xs">© {{ date('Y') }} SobatKos Indonesia. All rights reserved.</div>
    </div>
</footer>

    <script>

        const btn = document.getElementById('mobile-menu-btn');
        const menu = document.getElementById('mobile-menu');
        const icon = document.getElementById('menu-icon');
        const mobileLinks = document.querySelectorAll('.mobile-link'); 
        let isOpen = false;

        function closeMenu() {
            isOpen = false;
            menu.classList.remove('max-h-screen', 'opacity-100');
            menu.classList.add('max-h-0', 'opacity-0');
            btn.classList.remove('rotate-90');
            icon.classList.remove('fa-xmark'); icon.classList.add('fa-bars');
        }

        btn.addEventListener('click', () => {
            isOpen = !isOpen;
            if (isOpen) {
                menu.classList.remove('max-h-0', 'opacity-0');
                menu.classList.add('max-h-screen', 'opacity-100');
                btn.classList.add('rotate-90');
                icon.classList.remove('fa-bars'); icon.classList.add('fa-xmark');
            } else { closeMenu(); }
        });

        mobileLinks.forEach(link => link.addEventListener('click', closeMenu));
        document.addEventListener('click', (e) => { if (isOpen && !btn.contains(e.target) && !menu.contains(e.target)) closeMenu(); });
    </script>
</body>
</html>