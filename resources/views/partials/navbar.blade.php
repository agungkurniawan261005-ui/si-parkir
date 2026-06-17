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
                @auth
                    <a href="/admin" class="group relative inline-flex items-center gap-3 px-1.5 py-1.5 bg-white text-slate-800 font-medium rounded-full border border-slate-200 transition-all hover:border-brand-300 hover:shadow-md hover:-translate-y-0.5">
                        <img src="{{ auth()->user()->avatar_url ? asset('storage/' . auth()->user()->avatar_url) : 'https://ui-avatars.com/api/?name='.urlencode(auth()->user()->nama).'&background=0ea5e9&color=fff' }}" alt="{{ auth()->user()->nama }}" class="w-8 h-8 rounded-full object-cover shadow-sm">
                        <span class="pr-4 text-sm font-semibold text-slate-700 group-hover:text-brand-600 transition-colors">{{ auth()->user()->nama }}</span>
                    </a>
                @else
                    <a href="/admin/login" class="group relative inline-flex items-center gap-2 px-6 py-2.5 bg-slate-900 text-white font-medium rounded-xl overflow-hidden transition-all hover:shadow-lg hover:shadow-slate-900/20 hover:-translate-y-0.5">
                        <div class="absolute inset-0 bg-gradient-to-r from-brand-500 to-cyan-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <span class="relative flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                            </svg>
                            Login
                        </span>
                    </a>
                @endauth
            </div>

        </div>
    </nav>
