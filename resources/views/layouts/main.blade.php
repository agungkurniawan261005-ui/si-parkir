<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Parkir</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen bg-cover bg-center bg-no-repeat bg-fixed text-gray-800 relative z-0" style="background-image: url('/images/bg-web.png');">

    <nav class="bg-blue-600 text-white p-4 shadow-md">
        <div class="container mx-auto flex items-center justify-between">
            
            <div class="flex-1">
                <a href="/" class="text-2xl font-bold hover:text-gray-200">SI Parkir</a>
            </div>
            
            <div class="flex-1 flex justify-center hidden md:flex space-x-8">
                <a href="/" 
                   class="{{ request()->is('/') ? 'text-white border-b-2 border-white pb-1' : 'text-blue-200 hover:text-white' }} font-medium transition-all duration-300">
                    Beranda
                </a>
                
                <a href="/cek-slot" 
                   class="{{ request()->is('cek-slot') ? 'text-white border-b-2 border-white pb-1' : 'text-blue-200 hover:text-white' }} font-medium transition-all duration-300">
                    Cek Slot
                </a>
                
                <a href="/informasi-tarif" 
                   class="{{ request()->is('informasi-tarif') ? 'text-white border-b-2 border-white pb-1' : 'text-blue-200 hover:text-white' }} font-medium transition-all duration-300">
                    Tarif
                </a>
                
                <a href="/lacak-parkir" 
                   class="{{ request()->is('lacak-parkir') ? 'text-white border-b-2 border-white pb-1' : 'text-blue-200 hover:text-white' }} font-medium transition-all duration-300">
                    Lacak
                </a>
            </div>
            
            <div class="flex-1 flex justify-end">
                <a href="/admin" class="flex items-center gap-2 px-4 py-2 bg-white text-blue-600 font-bold rounded-lg hover:bg-gray-100 transition shadow-sm">
                    <span>🔐</span> Admin
                </a>
            </div>

        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white text-center py-6 mt-10">
        <p>&copy; {{ date('Y') }} Sistem Informasi Parkir. Hak Cipta Dilindungi.</p>
    </footer>

</body>
</html>