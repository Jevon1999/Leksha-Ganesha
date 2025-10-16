<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Batik Nusantara</title>
    
    <!-- Tailwind CSS untuk styling responsif dan modern -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Livewire Styles untuk komponen interaktif -->
    @livewireStyles
    
    <!-- Custom CSS untuk styling tambahan -->
    <style>
        /* Styling untuk sidebar shadow effect */
        .sidebar-shadow {
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.08);
        }
        
        /* Animasi pulse yang lebih halus untuk status online */
        .animate-pulse-gentle {
            animation: pulse-gentle 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        @keyframes pulse-gentle {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: .7;
            }
        }
        
        /* Custom scrollbar untuk sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
        
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        /* Perbaikan untuk menu hover dan gradient */
        .menu-item:hover {
            background-color: rgba(251, 191, 36, 0.1) !important;
            color: rgb(146, 64, 14) !important;
        }
        
        /* Styling untuk gradient yang konsisten */
        .bg-gradient-to-r {
            background-image: linear-gradient(to right, var(--tw-gradient-stops));
        }
        
        .bg-gradient-to-br {
            background-image: linear-gradient(to bottom right, var(--tw-gradient-stops));
        }
    </style>
</head>



<body class="bg-gray-50 font-sans">
    <!-- Mobile Sidebar Overlay untuk backdrop pada mobile view -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden transition-opacity duration-300"></div>
    
    <!-- Include Sidebar Component -->
    @include('layout.sidebar')
    


    <!-- Main Content Area dengan responsive margin untuk sidebar -->
    <main class="lg:ml-72 min-h-screen transition-all duration-300">
        <!-- Top Header Bar dengan mobile menu button dan breadcrumb -->
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
            <div class="flex items-center justify-between px-6 py-4">
                
                <!-- Mobile Menu Button - hanya tampil di mobile -->
                <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                


                <!-- Page Title dengan styling yang konsisten -->
                <div class="flex-1 lg:flex-none">
                    <h1 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h1>
                    <nav class="text-sm text-gray-500 mt-1">
                        @yield('breadcrumb', 'Dashboard')
                    </nav>
                </div>
                


                <!-- User Profile Dropdown - untuk fitur masa depan -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-8 h-8 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-semibold">A</span>
                            </div>
                            <span class="hidden md:block text-gray-700 font-medium">Admin</span>
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        


        <!-- Page Content dengan padding yang konsisten -->
        <div class="p-6">
            <!-- Flash Messages untuk notifikasi sukses/error -->
            @if (session()->has('message'))
                <div class="mb-6 p-4 rounded-lg border-l-4 {{ session('type') === 'success' ? 'bg-green-50 border-green-500 text-green-700' : 'bg-red-50 border-red-500 text-red-700' }}">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            @if(session('type') === 'success')
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            @else
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            @endif
                        </svg>
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            


            <!-- Main Content Slot untuk konten halaman -->
            @hasSection('content')
                @yield('content')
            @else
                {{ $slot }}
            @endif
        </div>
    </main>
    


    <!-- JavaScript untuk sidebar toggle functionality -->
    <script>
        // Mobile menu toggle functionality
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            
            
            // Fungsi untuk membuka sidebar pada mobile
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            
            
            
            // Fungsi untuk menutup sidebar pada mobile
            function closeSidebarFn() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
            
            
            
            // Event listeners untuk mobile menu
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', openSidebar);
            }
            
            if (closeSidebar) {
                closeSidebar.addEventListener('click', closeSidebarFn);
            }
            
            if (overlay) {
                overlay.addEventListener('click', closeSidebarFn);
            }
            
            
            
            // Auto close sidebar saat resize ke desktop
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeSidebarFn();
                }
            });
        });
    </script>
    


    <!-- Livewire Scripts untuk komponen interaktif -->
    @livewireScripts
</body>
</html>