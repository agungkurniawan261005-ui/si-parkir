<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Parkir</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#f0f9ff',
                            100: '#e0f2fe',
                            500: '#0ea5e9',
                            600: '#0284c7',
                            700: '#0369a1',
                            900: '#0c4a6e',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            background-attachment: fixed;
        }
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen text-slate-800 relative z-0 antialiased selection:bg-brand-500 selection:text-white">

    <!-- Decorative background elements -->
    <div class="fixed top-0 left-0 w-full h-full overflow-hidden -z-10 pointer-events-none">
        <div class="absolute top-[-10%] left-[-10%] w-[40%] h-[40%] rounded-full bg-brand-500/10 blur-3xl"></div>
        <div class="absolute bottom-[-10%] right-[-10%] w-[40%] h-[40%] rounded-full bg-cyan-500/10 blur-3xl"></div>
    </div>

    <nav class="bg-white/70 backdrop-blur-lg border-b border-white/50 text-slate-800 p-4 sticky top-0 z-50 transition-all duration-300 shadow-[0_4px_30px_rgba(0,0,0,0.03)]">
        <div class="container mx-auto flex items-center justify-between">

            <div class="flex-1">
                <a href="/" class="flex items-center gap-3 group">
                    <div class="w-12 h-12 bg-gradient-to-br from-brand-500 to-cyan-500 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-brand-500/30 transform transition group-hover:scale-105 group-hover:rotate-3">
                        P
                    </div>
                    <span class="font-bold text-xl tracking-tight bg-clip-text text-transparent bg-gradient-to-r from-brand-700 to-cyan-600">SIPARK</span>
                </a>
            </div>

            <div class="flex-1 flex justify-center hidden md:flex space-x-1">
                <a href="/"
                    class="px-4 py-2 rounded-lg font-medium transition-all duration-300 whitespace-nowrap {{ request()->is('/') ? 'bg-brand-50 text-brand-700 shadow-sm' : 'text-slate-500 hover:text-brand-600 hover:bg-slate-50' }}">
                    Beranda
                </a>

                <a href="/cek-slot"
                    class="px-4 py-2 rounded-lg font-medium transition-all duration-300 whitespace-nowrap {{ request()->is('cek-slot') ? 'bg-brand-50 text-brand-700 shadow-sm' : 'text-slate-500 hover:text-brand-600 hover:bg-slate-50' }}">
                    Cek Slot
                </a>

                <a href="/informasi-tarif"
                    class="px-4 py-2 rounded-lg font-medium transition-all duration-300 whitespace-nowrap {{ request()->is('informasi-tarif') ? 'bg-brand-50 text-brand-700 shadow-sm' : 'text-slate-500 hover:text-brand-600 hover:bg-slate-50' }}">
                    Tarif
                </a>

                <a href="/lacak-parkir"
                    class="px-4 py-2 rounded-lg font-medium transition-all duration-300 whitespace-nowrap {{ request()->is('lacak-parkir') ? 'bg-brand-50 text-brand-700 shadow-sm' : 'text-slate-500 hover:text-brand-600 hover:bg-slate-50' }}">
                    Lacak
                </a>

                <a href="/tentang-kami"
                    class="px-4 py-2 rounded-lg font-medium transition-all duration-300 whitespace-nowrap {{ request()->is('tentang-kami') ? 'bg-brand-50 text-brand-700 shadow-sm' : 'text-slate-500 hover:text-brand-600 hover:bg-slate-50' }}">
                    Tentang Kami
                </a>

                <a href="/tim-kami"
                    class="px-4 py-2 rounded-lg font-medium transition-all duration-300 whitespace-nowrap {{ request()->is('tim-kami') ? 'bg-brand-50 text-brand-700 shadow-sm' : 'text-slate-500 hover:text-brand-600 hover:bg-slate-50' }}">
                    Tim Kami
                </a>
            </div>

            <div class="flex-1 flex justify-end">
                <a href="/admin" class="group relative inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white font-medium rounded-xl overflow-hidden transition-all hover:shadow-lg hover:shadow-slate-900/20">
                    <div class="absolute inset-0 bg-gradient-to-r from-brand-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    <span class="relative flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        Admin
                    </span>
                </a>
            </div>

        </div>
    </nav>

    <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col relative z-10">
        @yield('content')
    </main>

    <footer class="mt-auto border-t border-slate-200/60 bg-white/50 backdrop-blur-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col md:flex-row items-center justify-between gap-4">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 bg-brand-500 rounded-lg flex items-center justify-center text-white font-bold text-sm">P</div>
                <span class="font-semibold text-slate-700">SIPARK</span>
            </div>
            <p class="text-slate-500 text-sm">&copy; {{ date('Y') }} Sistem Informasi Parkir. Hak Cipta Dilindungi.</p>
            <div class="flex gap-4">
                <a href="#" class="text-slate-400 hover:text-brand-500 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                </a>
                <a href="#" class="text-slate-400 hover:text-brand-500 transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"></path></svg>
                </a>
            </div>
        </div>
    </footer>

</body>

</html>