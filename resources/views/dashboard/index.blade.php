<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Leksha Ganesha</title>
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
    <style>
        @keyframes slideIn {
            from { transform: translateX(-100%); }
            to { transform: translateX(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes pulseGentle {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }
        .sidebar-shadow {
            box-shadow: 4px 0 15px rgba(139, 69, 19, 0.1);
        }
    </style>
   
    @livewireStyles
</head>
<body class="bg-gray-50 font-sans">
    <!-- Mobile Menu Overlay -->
    <div id="mobileOverlay" class="fixed inset-0 bg-black/50 z-40 lg:hidden hidden"></div>

   {{-- sidebar --}}
   @include('layout.sidebar')

    <!-- Main Content -->
    <main class="lg:ml-72 min-h-screen bg-gray-50">
        <!-- Top Navigation Bar -->
        <header class="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-30">
            <div class="flex items-center justify-between px-6 py-4">
                <div class="flex items-center space-x-4">
                    <button id="openSidebar" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                        <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">Dashboard</h2>
                        <p class="text-sm text-gray-500">Selamat datang kembali, Admin</p>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <input type="text" placeholder="Cari berita..." class="pl-10 pr-4 py-2 bg-gray-100 border-0 rounded-xl focus:ring-2 focus:ring-batik-light focus:bg-white transition-all">
                        <svg class="w-5 h-5 text-gray-400 absolute left-3 top-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>

                    <!-- Notifications -->
                    <button class="relative p-2 text-gray-600 hover:text-batik-dark transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5H9l5-5h1zm0 0V12a6 6 0 00-12 0v5h12z"></path>
                        </svg>
                        <span class="absolute -top-1 -right-1 w-3 h-3 bg-red-500 rounded-full"></span>
                    </button>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <div class="p-6">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Berita</p>
                            <p class="text-2xl font-bold text-gray-800">24</p>
                            <p class="text-xs text-green-600 mt-1">+3 minggu ini</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Berita Terbit</p>
                            <p class="text-2xl font-bold text-gray-800">21</p>
                            <p class="text-xs text-green-600 mt-1">87.5% dari total</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Draft</p>
                            <p class="text-2xl font-bold text-gray-800">3</p>
                            <p class="text-xs text-yellow-600 mt-1">Perlu review</p>
                        </div>
                        <div class="w-12 h-12 bg-yellow-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-600">Total Views</p>
                            <p class="text-2xl font-bold text-gray-800">12.5K</p>
                            <p class="text-xs text-green-600 mt-1">+15% bulan ini</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent News Section -->
            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="text-lg font-semibold text-gray-800">Berita Terbaru</h3>
                    <a href="#" class="text-batik-light hover:text-batik-dark text-sm font-medium transition-colors">Lihat Semua</a>
                </div>

                <div class="space-y-4">
                    <!-- News Item -->
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-16 h-16 bg-gradient-to-br from-batik-light to-batik-cream rounded-xl flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800 mb-1">Festival Batik Nusantara 2024 Sukses Digelar</h4>
                            <p class="text-sm text-gray-600 mb-2">Acara yang berlangsung selama 3 hari ini berhasil menarik lebih dari 10.000 pengunjung...</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span>2 jam lalu</span>
                                <span>•</span>
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full">Terbit</span>
                                <span>•</span>
                                <span>1.2K views</span>
                            </div>
                        </div>
                    </div>

 <!-- More news items... -->
                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-16 h-16 bg-gradient-to-br from-batik-brown to-batik-light rounded-xl flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800 mb-1">Tips Merawat Kain Batik Agar Tahan Lama</h4>
                            <p class="text-sm text-gray-600 mb-2">Beberapa cara sederhana untuk menjaga kualitas dan warna batik kesayangan Anda...</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span>5 jam lalu</span>
                                <span>•</span>
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full">Terbit</span>
                                <span>•</span>
                                <span>856 views</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-16 h-16 bg-gradient-to-br from-batik-cream to-batik-light rounded-xl flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800 mb-1">Motif Batik Tradisional vs Modern: Mana yang Lebih Diminati?</h4>
                            <p class="text-sm text-gray-600 mb-2">Analisis tren pasar batik di era digital dan preferensi konsumen masa kini...</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span>1 hari lalu</span>
                                <span>•</span>
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Draft</span>
                                <span>•</span>
                                <span>-</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-16 h-16 bg-gradient-to-br from-batik-light to-batik-cream rounded-xl flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800 mb-1">Sejarah Batik Pekalongan yang Kaya Akan Makna</h4>
                            <p class="text-sm text-gray-600 mb-2">Mengenal lebih dalam tentang asal usul dan perkembangan batik Pekalongan...</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span>2 hari lalu</span>
                                <span>•</span>
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full">Terbit</span>
                                <span>•</span>
                                <span>1.8K views</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-16 h-16 bg-gradient-to-br from-batik-dark to-batik-brown rounded-xl flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800 mb-1">Workshop Membatik Online: Belajar dari Rumah</h4>
                            <p class="text-sm text-gray-600 mb-2">Program pelatihan membatik virtual untuk memperluas jangkauan edukasi...</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span>3 hari lalu</span>
                                <span>•</span>
                                <span class="bg-green-100 text-green-700 px-2 py-1 rounded-full">Terbit</span>
                                <span>•</span>
                                <span>642 views</span>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center space-x-4 p-4 hover:bg-gray-50 rounded-xl transition-colors">
                        <div class="w-16 h-16 bg-gradient-to-br from-batik-cream to-batik-brown rounded-xl flex-shrink-0"></div>
                        <div class="flex-1">
                            <h4 class="font-medium text-gray-800 mb-1">Inovasi Pewarna Alami untuk Batik Ramah Lingkungan</h4>
                            <p class="text-sm text-gray-600 mb-2">Eksplorasi bahan pewarna dari tumbuhan lokal sebagai alternatif yang berkelanjutan...</p>
                            <div class="flex items-center space-x-4 text-xs text-gray-500">
                                <span>5 hari lalu</span>
                                <span>•</span>
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-1 rounded-full">Draft</span>
                                <span>•</span>
                                <span>-</span>
                            </div>
                        </div>
                    </div>
