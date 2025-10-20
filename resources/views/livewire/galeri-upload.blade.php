{{-- 
    Galeri Upload Component
    Komponen Livewire untuk mengelola galeri gambar dengan fitur upload, edit, dan delete
    Menggunakan Tailwind CSS dengan desain modern dan responsif
--}}

<div>
    {{-- Custom Styles --}}
    <style>
        .line-clamp-1 {
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .aspect-square {
            aspect-ratio: 1 / 1;
        }

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

        .sidebar-shadow {
            box-shadow: 2px 0 15px rgba(0, 0, 0, 0.1);
        }

        /* Modal Animations - Smooth entrance and exit */
        .modal-backdrop {
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            animation: slideInScale 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInScale {
            from {
                opacity: 0;
                transform: scale(0.9) translateY(-20px);
            }
            to {
                opacity: 1;
                transform: scale(1) translateY(0);
            }
        }

        /* Smooth transitions for all interactive elements */
        .smooth-transition {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Image upload area hover effect */
        .upload-area {
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            transform: scale(1.01);
            border-color: #9333ea;
        }

        /* Button hover effects */
        .btn-smooth {
            transition: all 0.2s ease;
        }

        .btn-smooth:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }

        .btn-smooth:active {
            transform: translateY(0);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        /* Card hover animation */
        .gallery-card {
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        /* Image zoom effect */
        .image-zoom {
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .gallery-card:hover .image-zoom {
            transform: scale(1.15);
        }

        /* Overlay fade effect */
        .overlay-fade {
            transition: opacity 0.4s ease;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>

    {{-- Header Section dengan Gradient --}}
    <div class="mb-8">
        <div class="bg-gradient-to-br from-batik-light via-orange-500 to-orange-400 rounded-2xl shadow-xl p-8 text-white">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div>
                    <h1 class="text-3xl font-bold mb-2">📸 Galeri Batik Nusantara</h1>
                    <p class="text-purple-100">Kelola koleksi gambar batik dan produk UMKM Anda</p>
                </div>
                <button wire:click="showUpload" class="mt-4 md:mt-0 bg-white text-orange-400 px-6 py-3 rounded-xl font-semibold hover:bg-purple-50 btn-smooth shadow-lg flex items-center space-x-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    <span>Upload Gambar Baru</span>
                </button>
            </div>
        </div>
    </div>

    {{-- Filter & Search Section --}}
    <div class="bg-white rounded-xl shadow-md p-6 mb-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            {{-- Search Bar --}}
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input wire:model.live.debounce.300ms="search" type="text" class="block w-full pl-10 pr-3 py-3 border border-gray-300 rounded-xl leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Cari judul atau deskripsi...">
            </div>

            {{-- Category Filter --}}
            <div class="relative">
                <select wire:model.live="categoryFilter" class="block w-full px-4 py-3 border border-gray-300 rounded-xl leading-5 bg-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                    <option value="">Semua Kategori</option>
                    @foreach($categories as $category)
                        <option value="{{ $category }}">{{ $category }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Stats --}}
        <div class="mt-4 flex items-center justify-between text-sm text-gray-600">
            <div>
                <span class="font-semibold text-orange-500">{{ $galeris->total() }}</span> gambar ditemukan
            </div>
            @if($search || $categoryFilter)
                <button wire:click="$set('search', ''); $set('categoryFilter', '')" class="text-purple-600 hover:text-purple-800 font-medium flex items-center space-x-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    <span>Reset Filter</span>
                </button>
            @endif
        </div>
    </div>

    {{-- Gallery Grid --}}
    @if($galeris->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-6">
            @foreach($galeris as $galeri)
                <div class="bg-white rounded-xl shadow-md overflow-hidden gallery-card group">
                    {{-- Image Container --}}
                    <div class="relative aspect-square overflow-hidden bg-gray-100">
                        <img src="{{ Storage::url($galeri->image) }}" alt="{{ $galeri->title }}" class="w-full h-full object-cover image-zoom">
                        
                        {{-- Overlay with Actions --}}
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent opacity-0 group-hover:opacity-100 overlay-fade flex items-end justify-between p-4">
                            <div class="flex space-x-2">
                                {{-- Edit Button --}}
                                <button wire:click="editGaleri({{ $galeri->id }})" class="bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-lg smooth-transition shadow-lg" title="Edit">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </button>

                                {{-- Delete Button --}}
                                <button wire:click="confirmDelete({{ $galeri->id }})" class="bg-red-500 hover:bg-red-600 text-white p-2 rounded-lg smooth-transition shadow-lg" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>

                            {{-- Category Badge --}}
                            <span class="bg-purple-500 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                {{ $galeri->category }}
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-4">
                        <h3 class="font-bold text-gray-800 text-lg mb-2 line-clamp-1">{{ $galeri->title }}</h3>
                        @if($galeri->description)
                            <p class="text-gray-600 text-sm line-clamp-2 mb-3">{{ $galeri->description }}</p>
                        @endif
                        
                        {{-- Stats --}}
                        <div class="flex items-center justify-between text-sm text-gray-500 pt-3 border-t border-gray-100">
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                <span>{{ $galeri->views }}</span>
                            </div>
                            <div class="text-xs">
                                {{ $galeri->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="bg-white rounded-xl shadow-md p-4">
            {{ $galeris->links() }}
        </div>
    @else
        {{-- Empty State --}}
        <div class="bg-white rounded-xl shadow-md p-12 text-center">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-purple-100 rounded-full mb-4">
                <svg class="w-10 h-10 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
            <h3 class="text-xl font-bold text-gray-800 mb-2">Belum Ada Gambar</h3>
            <p class="text-gray-600 mb-6">Mulai upload gambar batik dan produk UMKM Anda</p>
            <button wire:click="showUpload" class="bg-gradient-to-r from-purple-600 to-pink-500 text-white px-6 py-3 rounded-xl font-semibold hover:from-purple-700 hover:to-pink-600 btn-smooth shadow-lg">
                Upload Gambar Pertama
            </button>
        </div>
    @endif

    {{-- Upload Modal --}}
    @if($showUploadModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 modal-backdrop" wire:click.self="closeUploadModal">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto modal-content" wire:loading.class="opacity-50">
                {{-- Modal Header --}}
                <div class="bg-gradient-to-r from-orange-600 to-orange-500 text-white p-6 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold">Upload Gambar Baru</h3>
                        <button wire:click="closeUploadModal" class="text-white hover:bg-white/20 p-2 rounded-lg smooth-transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Modal Body --}}
                <form wire:submit.prevent="uploadGaleri" class="p-6 space-y-6">
                    {{-- Title Input --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul <span class="text-red-500">*</span></label>
                        <input wire:model="title" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Masukkan judul gambar">
                        @error('title') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Description Input --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea wire:model="description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all" placeholder="Masukkan deskripsi gambar (opsional)"></textarea>
                        @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Category Select --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select wire:model="category" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar <span class="text-red-500">*</span></label>
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center upload-area cursor-pointer" onclick="document.getElementById('imageUpload').click()">
                            @if($image)
                                <img src="{{ $image->temporaryUrl() }}" class="max-h-64 mx-auto rounded-lg shadow-md mb-4 smooth-transition">
                                <p class="text-sm text-gray-600">{{ $image->getClientOriginalName() }}</p>
                                <button type="button" wire:click="$set('image', null)" class="mt-2 text-red-500 hover:text-red-700 font-medium text-sm smooth-transition">Hapus Gambar</button>
                            @else
                                <svg class="w-16 h-16 mx-auto text-gray-400 mb-4 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600 font-medium mb-1">Klik untuk upload gambar</p>
                                <p class="text-sm text-gray-500">PNG, JPG, JPEG (Max 2MB)</p>
                            @endif
                        </div>
                        <input id="imageUpload" type="file" wire:model="image" class="hidden" accept="image/*">
                        @error('image') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        
                        <div wire:loading wire:target="image" class="text-sm text-purple-600 mt-2 flex items-center space-x-2">
                            <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Mengupload...</span>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                        <button type="button" wire:click="closeUploadModal" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 smooth-transition font-medium">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-500 text-white rounded-xl hover:from-purple-700 hover:to-pink-600 btn-smooth shadow-lg font-medium flex items-center space-x-2" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="uploadGaleri">Upload</span>
                            <span wire:loading wire:target="uploadGaleri" class="flex items-center space-x-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Mengupload...</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Edit Modal --}}
    @if($showEditModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 modal-backdrop" wire:click.self="closeEditModal">
            <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto modal-content" wire:loading.class="opacity-50">
                {{-- Modal Header --}}
                <div class="bg-gradient-to-r from-blue-600 to-cyan-500 text-white p-6 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold">Edit Gambar</h3>
                        <button wire:click="closeEditModal" class="text-white hover:bg-white/20 p-2 rounded-lg smooth-transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Modal Body --}}
                <form wire:submit.prevent="updateGaleri" class="p-6 space-y-6">
                    {{-- Title Input --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Judul <span class="text-red-500">*</span></label>
                        <input wire:model="title" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Masukkan judul gambar">
                        @error('title') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Description Input --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
                        <textarea wire:model="description" rows="3" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" placeholder="Masukkan deskripsi gambar (opsional)"></textarea>
                        @error('description') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Category Select --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Kategori <span class="text-red-500">*</span></label>
                        <select wire:model="category" class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $cat)
                                <option value="{{ $cat }}">{{ $cat }}</option>
                            @endforeach
                        </select>
                        @error('category') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                    </div>

                    {{-- Current Image & Upload New --}}
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-2">Gambar</label>
                        
                        {{-- Current Image --}}
                        @if($existingImage && !$image)
                            <div class="mb-4">
                                <p class="text-sm text-gray-600 mb-2">Gambar Saat Ini:</p>
                                <img src="{{ Storage::url($existingImage) }}" class="max-h-48 rounded-lg shadow-md">
                            </div>
                        @endif

                        {{-- Upload New Image --}}
                        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center upload-area cursor-pointer" onclick="document.getElementById('imageEdit').click()">
                            @if($image)
                                <img src="{{ $image->temporaryUrl() }}" class="max-h-64 mx-auto rounded-lg shadow-md mb-4 smooth-transition">
                                <p class="text-sm text-gray-600">{{ $image->getClientOriginalName() }}</p>
                                <button type="button" wire:click="$set('image', null)" class="mt-2 text-red-500 hover:text-red-700 font-medium text-sm smooth-transition">Hapus Gambar Baru</button>
                            @else
                                <svg class="w-12 h-12 mx-auto text-gray-400 mb-3 smooth-transition" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                </svg>
                                <p class="text-gray-600 font-medium mb-1">Klik untuk ganti gambar</p>
                                <p class="text-sm text-gray-500">PNG, JPG, JPEG (Max 2MB)</p>
                            @endif
                        </div>
                        <input id="imageEdit" type="file" wire:model="image" class="hidden" accept="image/*">
                        @error('image') <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span> @enderror
                        
                        <div wire:loading wire:target="image" class="text-sm text-blue-600 mt-2 flex items-center space-x-2">
                            <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span>Mengupload...</span>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex justify-end space-x-3 pt-4 border-t border-gray-200">
                        <button type="button" wire:click="closeEditModal" class="px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 smooth-transition font-medium">
                            Batal
                        </button>
                        <button type="submit" class="px-6 py-3 bg-gradient-to-r from-blue-600 to-cyan-500 text-white rounded-xl hover:from-blue-700 hover:to-cyan-600 btn-smooth shadow-lg font-medium flex items-center space-x-2" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="updateGaleri">Update</span>
                            <span wire:loading wire:target="updateGaleri" class="flex items-center space-x-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Mengupdate...</span>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    {{-- Delete Confirmation Modal --}}
    @if($showDeleteModal)
        <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4 modal-backdrop" wire:click.self="cancelDelete">
            <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full modal-content" wire:loading.class="opacity-50">
                {{-- Modal Header --}}
                <div class="bg-gradient-to-r from-red-600 to-pink-600 text-white p-6 rounded-t-2xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-2xl font-bold">Konfirmasi Hapus</h3>
                        <button wire:click="cancelDelete" class="text-white hover:bg-white/20 p-2 rounded-lg smooth-transition">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Modal Body --}}
                <div class="p-6">
                    <div class="flex items-center justify-center mb-4">
                        <div class="w-16 h-16 bg-red-100 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                            </svg>
                        </div>
                    </div>
                    <h4 class="text-lg font-bold text-gray-800 text-center mb-2">Apakah Anda yakin?</h4>
                    <p class="text-gray-600 text-center mb-6">Gambar yang dihapus tidak dapat dikembalikan. Tindakan ini bersifat permanen.</p>

                    {{-- Action Buttons --}}
                    <div class="flex space-x-3">
                        <button type="button" wire:click="cancelDelete" class="flex-1 px-6 py-3 border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 smooth-transition font-medium">
                            Batal
                        </button>
                        <button type="button" wire:click="deleteGaleri" class="flex-1 px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 text-white rounded-xl hover:from-red-700 hover:to-pink-700 btn-smooth shadow-lg font-medium flex items-center justify-center space-x-2" wire:loading.attr="disabled">
                            <span wire:loading.remove wire:target="deleteGaleri">Hapus</span>
                            <span wire:loading wire:target="deleteGaleri" class="flex items-center space-x-2">
                                <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span>Menghapus...</span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
