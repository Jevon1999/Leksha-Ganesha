<aside id="sidebar" class="fixed left-0 top-0 z-50 h-full w-72 bg-white sidebar-shadow transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out">
    <!-- Sidebar Header -->
    <div class="flex items-center justify-between p-6 border-b border-gray-100">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-br from-batik-brown to-batik-light rounded-xl flex items-center justify-center shadow-lg">
                <span class="text-white text-xl">🎨</span>
            </div>
            <div>
                <h1 class="text-lg font-bold text-batik-dark">Batik Nusantara</h1>
                <p class="text-xs text-gray-500">UMKM Dashboard</p>
            </div>
        </div>
        <button id="closeSidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>

    <!-- User Profile Section -->
    <div class="p-6 border-b border-gray-100">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-gradient-to-br from-batik-light to-batik-cream rounded-full flex items-center justify-center shadow-md">
                <span class="text-batik-dark text-lg font-semibold">AS</span>
            </div>
            <div class="flex-1">
                <h3 class="font-semibold text-gray-800">Admin</h3>
                <p class="text-sm text-gray-500">Admin UMKM</p>
                <div class="flex items-center mt-1">
                    <span class="w-2 h-2 bg-green-400 rounded-full animate-pulse-gentle"></span>
                    <span class="text-xs text-green-600 ml-2">Online</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 p-4 space-y-2 overflow-y-auto">
        <!-- Dashboard -->
        <a href="{{ route('show.dashboard') }}" class="{{ request()->routeIs('show.dashboard') ? 'flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-batik-brown to-batik-light text-white shadow-lg transform transition-all duration-200 hover:scale-105' : 'menu-item flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-batik-cream/20 hover:text-batik-dark transition-all duration-200 group' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v0H8v0z"></path>
            </svg>
            <span class="font-medium">Dashboard</span>
        </a>

        <!-- Manajemen Berita Section -->
        <div class="pt-4">
            <h4 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Manajemen Berita</h4>

            <!-- Semua Berita -->
            <a href="{{ route('admin.berita.index') }}" class="{{ request()->routeIs('admin.berita.index') ? 'flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-batik-brown to-batik-light text-white shadow-lg transform transition-all duration-200 hover:scale-105' : 'menu-item flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-batik-cream/20 hover:text-batik-dark transition-all duration-200 group' }}">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                </svg>
                <span class="font-medium">Semua Berita</span>
                {{-- <span class="ml-auto bg-batik-light/10 text-batik-dark text-xs px-2 py-1 rounded-full">24</span> --}}
            </a>

            <!-- Tambah Berita -->
            <a href={{ route('form.berita') }} class="{{ request()->routeIs('form.berita') ? 'flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-batik-brown to-batik-light text-white shadow-lg transform transition-all duration-200 hover:scale-105' : 'menu-item flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-batik-cream/20 hover:text-batik-dark transition-all duration-200 group' }}">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-medium">Tambah Berita</span>
            </a>

            <!-- Draft Berita -->
            <a href="#" class="menu-item flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-batik-cream/20 hover:text-batik-dark transition-all duration-200 group">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <span class="font-medium">Draft</span>
                <span class="ml-auto bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded-full">3</span>
            </a>


        <!-- Settings -->
        <div class="pt-4">
            <h4 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">Pengaturan</h4>

            <a href="#" class="menu-item flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-batik-cream/20 hover:text-batik-dark transition-all duration-200 group">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                </svg>
                <span class="font-medium">Pengaturan</span>
            </a>

            <a href="#" class="menu-item flex items-center space-x-3 px-4 py-3 rounded-xl text-gray-700 hover:bg-batik-cream/20 hover:text-batik-dark transition-all duration-200 group">
                <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
                <span class="font-medium">Profil</span>
            </a>
        </div>
    </nav>

    <!-- Sidebar Footer -->
    <div class="p-4 border-t border-gray-100">
        <button class="flex items-center space-x-3 px-4 py-3 w-full rounded-xl text-red-600 hover:bg-red-50 transition-all duration-200 group">
            <svg class="w-5 h-5 group-hover:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
            </svg>
            <span class="font-medium">Keluar</span>
        </button>
    </div>
</aside>
