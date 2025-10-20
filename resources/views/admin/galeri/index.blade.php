<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galeri Batik - Leksha Ganesha</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'batik-brown': '#8B4513',
                        'batik-light': '#CD853F',
                        'batik-cream': '#DEB887',
                        'batik-dark': '#654321',
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'fade-in': 'fadeIn 0.2s ease-out',
                        'pulse-gentle': 'pulseGentle 2s infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Livewire Styles -->
    @livewireStyles
    
    <style>
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes pulseGentle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.7; }
        }
        
        .sidebar-shadow {
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.08);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans">
    <!-- Mobile Sidebar Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden transition-opacity duration-300"></div>
    
    <!-- Include Sidebar -->
    @include('layout.sidebar')
    
    <!-- Main Content -->
    <main class="lg:ml-72 min-h-screen transition-all duration-300">
        <!-- Top Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 sticky top-0 z-30">
            <div class="flex items-center justify-between px-6 py-4">
                <!-- Mobile Menu Button -->
                <button id="mobileMenuBtn" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
                
                <!-- Page Title -->
                <div class="flex-1 lg:flex-none">
                    <h1 class="text-2xl font-bold text-gray-800">Galeri Batik</h1>
                    <nav class="text-sm text-gray-500 mt-1">Dashboard > Galeri</nav>
                </div>
                
                <!-- User Profile -->
                <div class="flex items-center space-x-4">
                    <div class="relative">
                        <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition-colors">
                            <div class="w-8 h-8 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center">
                                <span class="text-white text-sm font-semibold">A</span>
                            </div>
                            <span class="hidden md:block text-gray-700 font-medium">Admin</span>
                        </button>
                    </div>
                </div>
            </div>
        </header>
        
        <!-- Page Content -->
        <div class="p-6">
            <!-- Flash Messages -->
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
            
            <!-- Livewire Component -->
            @livewire('galeri-upload')
        </div>
    </main>

    <!-- JavaScript for sidebar toggle -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const closeSidebar = document.getElementById('closeSidebar');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                document.body.style.overflow = 'hidden';
            }
            
            function closeSidebarFn() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
                document.body.style.overflow = 'auto';
            }
            
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', openSidebar);
            }
            
            if (closeSidebar) {
                closeSidebar.addEventListener('click', closeSidebarFn);
            }
            
            if (overlay) {
                overlay.addEventListener('click', closeSidebarFn);
            }
            
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 1024) {
                    closeSidebarFn();
                }
            });
        });
    </script>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
