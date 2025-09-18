<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Batik Nusantara - Berita & Inspirasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>
        .font-playfair { font-family: 'Playfair Display', serif; }
        .font-inter { font-family: 'Inter', sans-serif; }

        .batik-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23f59e0b' fill-opacity='0.08'%3E%3Cpath d='M30 30c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20zm15 15c0-11.046-8.954-20-20-20s-20 8.954-20 20 8.954 20 20 20 20-8.954 20-20z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .hero-gradient {
            background: linear-gradient(135deg, #fef3c7 0%, #fde68a 25%, #f59e0b 50%, #d97706 75%, #92400e 100%);
        }

        .text-shadow {
            text-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.9);
        }

        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .scroll-indicator {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translate3d(0,0,0);
            }
            40%, 43% {
                transform: translate3d(0,-15px,0);
            }
            70% {
                transform: translate3d(0,-7px,0);
            }
            90% {
                transform: translate3d(0,-3px,0);
            }
        }
    </style>
</head>
<body class="font-inter bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 min-h-screen">

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 glass-effect border-b border-amber-200/30" data-aos="fade-down">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-gradient-to-br from-amber-600 to-orange-600 rounded-lg flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <span class="font-playfair text-xl font-bold text-amber-800">Batik Nusantara</span>
                </div>
                <div class="hidden md:flex space-x-8">
                    <a href="#" class="text-amber-700 hover:text-amber-900 font-medium transition-colors">Beranda</a>
                    <a href="#berita" class="text-amber-700 hover:text-amber-900 font-medium transition-colors">Berita</a>
                    <a href="#galer" class="text-amber-700 hover:text-amber-900 font-medium transition-colors">Galeri</a>
                    <a href="#" class="text-amber-700 hover:text-amber-900 font-medium transition-colors">Tentang</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-gradient min-h-screen flex items-center justify-center relative overflow-hidden pt-16">
        <div class="batik-pattern absolute inset-0 opacity-30"></div>
        <div class="relative z-10 text-center px-4 max-w-4xl mx-auto" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="font-playfair text-5xl md:text-7xl font-bold text-white mb-6 text-shadow">
                Warisan <span class="text-amber-200">Batik</span> Nusantara
            </h1>
            <p class="text-xl md:text-2xl text-amber-100 mb-8 font-light leading-relaxed">
                Jelajahi keindahan, sejarah, dan perkembangan batik Indonesia melalui berita dan inspirasi terkini
            </p>
            <a href="#berita" class="inline-flex items-center px-8 py-4 bg-white text-amber-800 font-semibold rounded-full hover:bg-amber-50 transition-all duration-300 transform hover:scale-105 shadow-lg">
                <span>Jelajahi Berita</span>
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                </svg>
            </a>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 scroll-indicator">
            <div class="w-6 h-10 border-2 border-white rounded-full flex justify-center">
                <div class="w-1 h-3 bg-white rounded-full mt-2 animate-pulse"></div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="relative z-10 -mt-20">
        
        
        
        <!-- Section Header -->
        <div id="berita" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-amber-600 to-orange-600 text-white rounded-full mb-6 shadow-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"/>
                    </svg>
                </div>
                <h2 class="font-playfair text-4xl md:text-5xl font-bold text-amber-800 mb-4">Berita Terkini</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-amber-600 to-orange-600 mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-amber-700 max-w-2xl mx-auto leading-relaxed">
                    Ikuti perkembangan terbaru dunia batik, dari inovasi desain hingga pelestarian budaya
                </p>
            </div>

            
            

            <!-- News Grid -->
            <div class="space-y-8">
                @foreach($beritas as $index => $berita)
                    <article class="glass-effect rounded-2xl overflow-hidden shadow-xl hover-lift border border-amber-200/30"
                             data-aos="fade-up"
                             data-aos-delay="{{ $index * 100 }}">

                        @if($index % 2 === 0)
                            <!-- Layout: Image Left, Content Right -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[400px]">
                                <div class="relative overflow-hidden group">
                                    <img src="{{ asset( "storage/" . $berita->image) }}"
                                         alt="{{ $berita->title }}"
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                        <span>{{ $berita->image }}</span>
                                    <div class="absolute inset-0 bg-gradient-to-r from-transparent to-black/20 group-hover:to-black/40 transition-all duration-300"></div>
                                    <div class="absolute top-4 left-4">
                                        <span class="bg-gradient-to-r from-amber-600 to-orange-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg">
                                            Berita Utama
                                        </span>
                                    </div>
                                </div>
                                <div class="p-8 lg:p-12 flex flex-col justify-center">
                                    <div class="flex items-center space-x-4 mb-4">
                                        <div class="flex items-center text-amber-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-sm font-medium">{{ date('d F Y') }}</span>
                                        </div>
                                        <div class="w-1 h-1 bg-amber-400 rounded-full"></div>
                                        <div class="flex items-center text-amber-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-sm font-medium">Admin Batik</span>
                                        </div>
                                    </div>
                                    <h3 class="font-playfair text-2xl lg:text-3xl font-bold text-amber-800 mb-4 leading-tight">
                                        {{ $berita->title }}
                                    </h3>
                                    <p class="text-amber-700 leading-relaxed mb-6 text-lg">
                                        {{ Str::limit($berita->text, 180) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="inline-flex items-center text-amber-600 hover:text-amber-800 font-semibold transition-colors group">
                                            <span>Baca Selengkapnya</span>
                                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                        <div class="flex space-x-3">
                                            <button class="p-2 text-amber-600 hover:text-amber-800 hover:bg-amber-100 rounded-full transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                                </svg>
                                            </button>
                                            <button class="p-2 text-amber-600 hover:text-amber-800 hover:bg-amber-100 rounded-full transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Layout: Content Left, Image Right -->
                            <div class="grid grid-cols-1 lg:grid-cols-2 min-h-[400px]">
                                <div class="p-8 lg:p-12 flex flex-col justify-center order-2 lg:order-1">
                                    <div class="flex items-center space-x-4 mb-4">
                                        <div class="flex items-center text-amber-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-sm font-medium">{{ date('d F Y') }}</span>
                                        </div>
                                        <div class="w-1 h-1 bg-amber-400 rounded-full"></div>
                                        <div class="flex items-center text-amber-600">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                            <span class="text-sm font-medium">Admin Batik</span>
                                        </div>
                                    </div>
                                    <h3 class="font-playfair text-2xl lg:text-3xl font-bold text-amber-800 mb-4 leading-tight">
                                        {{ $berita->title }}
                                    </h3>
                                    <p class="text-amber-700 leading-relaxed mb-6 text-lg">
                                        {{ Str::limit($berita->text, 180) }}
                                    </p>
                                    <div class="flex items-center justify-between">
                                        <a href="#" class="inline-flex items-center text-amber-600 hover:text-amber-800 font-semibold transition-colors group">
                                            <span>Baca Selengkapnya</span>
                                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                            </svg>
                                        </a>
                                        <div class="flex space-x-3">
                                            <button class="p-2 text-amber-600 hover:text-amber-800 hover:bg-amber-100 rounded-full transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"/>
                                                </svg>
                                            </button>
                                            <button class="p-2 text-amber-600 hover:text-amber-800 hover:bg-amber-100 rounded-full transition-colors">
                                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="relative overflow-hidden group order-1 lg:order-2">
                                    <img src="{{ asset("storage/" . $berita->image) }}"
                                         alt="{{ $berita->title }}"
                                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110" />
                                    <div class="absolute inset-0 bg-gradient-to-l from-transparent to-black/20 group-hover:to-black/40 transition-all duration-300"></div>
                                    <div class="absolute top-4 right-4">
                                        <span class="bg-gradient-to-r from-amber-600 to-orange-600 text-white px-3 py-1 rounded-full text-sm font-medium shadow-lg">
                                            Trending
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </article>
                @endforeach
            </div>

            <!-- Load More Button -->
            <div class="text-center mt-12" data-aos="fade-up">
                <button class="bg-gradient-to-r from-amber-600 to-orange-600 hover:from-amber-700 hover:to-orange-700 text-white font-bold py-4 px-8 rounded-full transition-all duration-300 transform hover:scale-105 shadow-lg flex items-center mx-auto space-x-2">
                    <span>Muat Berita Lainnya</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"/>
                    </svg>
                </button>
            </div>
        </div>


        
        



        <div id="galer" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-gradient-to-r from-amber-600 to-orange-600 text-white rounded-full mb-6 shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 0 0 1.5-1.5V6a1.5 1.5 0 0 0-1.5-1.5H3.75A1.5 1.5 0 0 0 2.25 6v12a1.5 1.5 0 0 0 1.5 1.5Zm10.5-11.25h.008v.008h-.008V8.25Zm.375 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                    </svg>                      
                </div>
                <h2 class="font-playfair text-4xl md:text-5xl font-bold text-amber-800 mb-4">Galer berkualitas</h2>
                <div class="w-24 h-1 bg-gradient-to-r from-amber-600 to-orange-600 mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-amber-700 max-w-2xl mx-auto leading-relaxed">
                    galer ipsum dolor sit pler, sit amet consectetur adipisicing elit. Accusamus assumenda,
                </p>
            </div>




            <div class="bg-white-500/10 h-screen h-full py-6 sm:py-8 lg:py-12">
                <div class="mx-auto max-w-screen-2xl px-4 md:px-8">

                    <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:gap-6 xl:gap-8">
                        <!-- image - start -->
                        <a href="#"
                            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                            <img src="https://images.unsplash.com/photo-1593508512255-86ab42a8e620?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Minh Pham" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                            </div>
            
                            <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">VR</span>
                        </a>
                        <!-- image - end -->
            
                        <!-- image - start -->
                        <a href="#"
                            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                            <img src="https://images.unsplash.com/photo-1542759564-7ccbb6ac450a?auto=format&q=75&fit=crop&w=1000" loading="lazy" alt="Photo by Magicle" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                            </div>
            
                            <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Tech</span>
                        </a>
                        <!-- image - end -->
            
                        <!-- image - start -->
                        <a href="#"
                            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:col-span-2 md:h-80">
                            <img src="https://images.unsplash.com/photo-1610465299996-30f240ac2b1c?auto=format&q=75&fit=crop&w=1000" loading="lazy" alt="Photo by Martin Sanchez" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                            </div>
            
                            <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Dev</span>
                        </a>
                        <!-- image - end -->
            
                        <!-- image - start -->
                        <a href="#"
                            class="group relative flex h-48 items-end overflow-hidden rounded-lg bg-gray-100 shadow-lg md:h-80">
                            <img src="https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&q=75&fit=crop&w=600" loading="lazy" alt="Photo by Lorenzo Herrera" class="absolute inset-0 h-full w-full object-cover object-center transition duration-200 group-hover:scale-110" />
            
                            <div
                                class="pointer-events-none absolute inset-0 bg-gradient-to-t from-gray-800 via-transparent to-transparent opacity-50">
                            </div>
            
                            <span class="relative ml-4 mb-3 inline-block text-sm text-white md:ml-5 md:text-lg">Retro</span>
                        </a>
                        <!-- image - end -->
                    </div>
                    
                    
                </div>
            </div>
            
            

        </div>
    </main>
    
    
    
    
    
    
    
    
    

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-amber-800 to-orange-800 text-white py-12 mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <div class="flex items-center justify-center space-x-3 mb-4">
                    <div class="w-12 h-12 bg-gradient-to-br from-amber-400 to-orange-400 rounded-lg flex items-center justify-center">
                        <svg class="w-7 h-7 text-amber-800" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z"/>
                        </svg>
                    </div>
                    <span class="font-playfair text-2xl font-bold">Batik Nusantara</span>
                </div>
                <p class="text-amber-200 max-w-2xl mx-auto leading-relaxed">
                    Melestarikan warisan budaya batik Indonesia melalui informasi, edukasi, dan inspirasi untuk generasi mendatang.
                </p>
                <div class="mt-8 pt-8 border-t border-amber-700">
                    <p class="text-amber-300">&copy; 2025 Batik Nusantara. Semua hak cipta dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- AOS Library -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            easing: 'ease-out-cubic',
            once: true,
            offset: 100
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
