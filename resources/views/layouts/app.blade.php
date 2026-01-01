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