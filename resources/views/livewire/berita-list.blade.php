<div>
    <!-- Page Header dengan title dan action button -->
    <div class="mb-8">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            
            <!-- Page Title dan Description -->
            <div class="mb-4 sm:mb-0">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">Daftar Berita</h1>
                <p class="text-gray-600">Kelola semua berita dan artikel batik Anda di sini</p>
            </div>
            


            <!-- Action Button untuk tambah berita baru -->
            <div class="flex space-x-3">
                <a href="{{ route('form.berita') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                    Tambah Berita
                </a>
            </div>
        </div>
    </div>
    


    <!-- Filters and Search Section -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 mb-6">
        <div class="p-6">
            
            <!-- Search Bar dan Filter Controls -->
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between space-y-4 lg:space-y-0 lg:space-x-4">
                
                <!-- Search Input dengan icon -->
                <div class="flex-1 max-w-md">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input wire:model.live="search" 
                               type="text" 
                               placeholder="Cari berita berdasarkan judul atau konten..."
                               class="block w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                    </div>
                </div>
                


                <!-- Per Page Selector untuk mengatur jumlah data per halaman -->
                <div class="flex items-center space-x-4">
                    <label for="perPage" class="text-sm font-medium text-gray-700 whitespace-nowrap">Tampilkan:</label>
                    <select wire:model.live="perPage" 
                            id="perPage"
                            class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200">
                        <option value="5">5 item</option>
                        <option value="10">10 item</option>
                        <option value="25">25 item</option>
                        <option value="50">50 item</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    


    <!-- Data Table Card dengan responsive design -->
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        
        <!-- Table Header dengan jumlah total data -->
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">
                    Total: {{ $beritas->total() }} berita
                </h3>
                
                <!-- Loading indicator saat ada proses -->
                <div wire:loading class="flex items-center text-blue-600">
                    <svg class="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Memuat...
                </div>
            </div>
        </div>
        


        <!-- Responsive Table dengan horizontal scroll pada mobile -->
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                
                <!-- Table Header dengan sorting functionality -->
                <thead class="bg-gray-50">
                    <tr>
                        
                        <!-- Column Gambar - tidak bisa disort -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Gambar
                        </th>
                        


                        <!-- Column Judul dengan sorting -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                            wire:click="sortBy('title')">
                            <div class="flex items-center space-x-1">
                                <span>Judul</span>
                                @if($sortField === 'title')
                                    <svg class="w-4 h-4 {{ $sortDirection === 'asc' ? 'transform rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        


                        <!-- Column Konten - tidak bisa disort -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Konten
                        </th>
                        


                        <!-- Column Views dengan sorting -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                            wire:click="sortBy('views')">
                            <div class="flex items-center space-x-1">
                                <span>Views</span>
                                @if($sortField === 'views')
                                    <svg class="w-4 h-4 {{ $sortDirection === 'asc' ? 'transform rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        


                        <!-- Column Tanggal dengan sorting -->
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider cursor-pointer hover:bg-gray-100 transition-colors duration-200"
                            wire:click="sortBy('created_at')">
                            <div class="flex items-center space-x-1">
                                <span>Tanggal</span>
                                @if($sortField === 'created_at')
                                    <svg class="w-4 h-4 {{ $sortDirection === 'asc' ? 'transform rotate-180' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                @else
                                    <svg class="w-4 h-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4m6 0v12m0 0l4-4m-4 4l-4-4"></path>
                                    </svg>
                                @endif
                            </div>
                        </th>
                        


                        <!-- Column Actions -->
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                


                <!-- Table Body dengan data berita -->
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($beritas as $berita)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            
                            <!-- Column Gambar dengan preview -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    @if($berita->image)
                                        <img class="h-16 w-16 object-cover rounded-lg shadow-sm border border-gray-200" 
                                             src="{{ asset('storage/' . $berita->image) }}" 
                                             alt="{{ $berita->title }}"
                                             loading="lazy">
                                    @else
                                        <div class="h-16 w-16 bg-gray-200 rounded-lg flex items-center justify-center border border-gray-200">
                                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    @endif
                                </div>
                            </td>
                            


                            <!-- Column Judul dengan line clamp untuk membatasi text -->
                            <td class="px-6 py-4">
                                <div class="text-sm font-semibold text-gray-900 line-clamp-2 max-w-xs">
                                    {{ $berita->title }}
                                </div>
                            </td>
                            


                            <!-- Column Konten dengan text truncate -->
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600 line-clamp-3 max-w-md">
                                    {{ Str::limit($berita->text, 100) }}
                                </div>
                            </td>
                            


                            <!-- Column Views dengan badge styling -->
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    {{ number_format($berita->views) }}
                                </span>
                            </td>
                            


                            <!-- Column Tanggal dengan format yang readable -->
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <div class="flex flex-col">
                                    <span class="font-medium">{{ $berita->created_at->format('d M Y') }}</span>
                                    <span class="text-xs text-gray-400">{{ $berita->created_at->format('H:i') }}</span>
                                </div>
                            </td>
                            


                            <!-- Column Actions dengan dropdown menu -->
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex items-center justify-end space-x-2">
                                    
                                    <!-- Button Edit -->
                                    <button wire:click="editBerita({{ $berita->id }})"
                                            class="inline-flex items-center px-3 py-1.5 bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-xs font-medium rounded-md transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                        Edit
                                    </button>
                                    


                                    <!-- Button Delete -->
                                    <button wire:click="confirmDelete({{ $berita->id }})"
                                            class="inline-flex items-center px-3 py-1.5 bg-red-100 hover:bg-red-200 text-red-800 text-xs font-medium rounded-md transition-colors duration-200">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <!-- Empty state ketika tidak ada data -->
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <svg class="w-16 h-16 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9.5a2.5 2.5 0 00-2.5-2.5H15"></path>
                                    </svg>
                                    <div class="text-center">
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Tidak ada berita</h3>
                                        <p class="text-gray-500 mb-4">
                                            @if($search)
                                                Tidak ada berita yang ditemukan dengan kata kunci "{{ $search }}"
                                            @else
                                                Belum ada berita yang dibuat. Mulai dengan membuat berita pertama Anda.
                                            @endif
                                        </p>
                                        <a href="{{ route('form.berita') }}" 
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                            </svg>
                                            Tambah Berita
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        


        <!-- Pagination Section dengan info halaman -->
        @if($beritas->hasPages())
            <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
                <div class="flex items-center justify-between">
                    
                    <!-- Pagination Info -->
                    <div class="flex-1 flex justify-between sm:hidden">
                        <span class="text-sm text-gray-700">
                            Menampilkan {{ $beritas->firstItem() }} sampai {{ $beritas->lastItem() }} dari {{ $beritas->total() }} hasil
                        </span>
                    </div>
                    


                    <!-- Desktop Pagination -->
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Menampilkan 
                                <span class="font-medium">{{ $beritas->firstItem() }}</span> 
                                sampai 
                                <span class="font-medium">{{ $beritas->lastItem() }}</span> 
                                dari 
                                <span class="font-medium">{{ $beritas->total() }}</span> 
                                hasil
                            </p>
                        </div>
                        <div>
                            {{ $beritas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    


    <!-- Modal Konfirmasi Delete dengan structure yang diperbaiki -->
    @if($showDeleteModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background-color: rgba(0,0,0,0.5);">
            <!-- Modal Panel yang sudah disederhanakan -->
            <div class="bg-white rounded-lg shadow-xl max-w-md w-full mx-4 p-6">
                
                <!-- Modal Header dengan icon warning -->
                <div class="flex items-start mb-4">
                    <div class="flex-shrink-0 w-10 h-10 bg-red-100 rounded-full flex items-center justify-center mr-3">
                        <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.082 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                        </svg>
                    </div>
                    
                    <!-- Modal Content -->
                    <div class="flex-1">
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">Hapus Berita</h3>
                        <p class="text-sm text-gray-600">
                            Apakah Anda yakin ingin menghapus berita ini? Tindakan ini tidak dapat dibatalkan.
                        </p>
                    </div>
                </div>
                
                <!-- Modal Actions yang diperbaiki -->
                <div class="flex justify-end space-x-3 mt-6">
                    <!-- Button Cancel -->
                    <button wire:click="cancelDelete" 
                            type="button" 
                            class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 rounded-lg transition-colors duration-200">
                        Batal
                    </button>
                    
                    <!-- Button Confirm Delete -->
                    <button wire:click="deleteBerita" 
                            type="button" 
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-colors duration-200 flex items-center">
                        <span wire:loading.remove wire:target="deleteBerita">Hapus</span>
                        <span wire:loading wire:target="deleteBerita" class="flex items-center">
                            <svg class="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menghapus...
                        </span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    


    <!-- Modal Edit Berita dengan strukture yang diperbaiki -->
    @if($showEditModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center p-4" style="background-color: rgba(0,0,0,0.5);">
            <!-- Modal Panel Edit yang sudah disederhanakan -->
            <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 p-6 max-h-[90vh] overflow-y-auto">
                    
                    <!-- Modal Header -->
                    <div class="mb-6">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold text-gray-900">Edit Berita</h3>
                            <button wire:click="cancelEdit" class="text-gray-400 hover:text-gray-600 transition-colors duration-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <p class="text-sm text-gray-500 mt-1">Ubah informasi berita sesuai kebutuhan Anda</p>
                    </div>
                    


                    <!-- Form Edit -->
                    <form wire:submit.prevent="updateBerita" class="space-y-6">
                        
                        <!-- Field Judul -->
                        <div>
                            <label for="editTitle" class="block text-sm font-medium text-gray-700 mb-2">
                                Judul Berita <span class="text-red-500">*</span>
                            </label>
                            <input wire:model="editTitle" 
                                   type="text" 
                                   id="editTitle"
                                   class="block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 @error('editTitle') border-red-500 @else border-gray-300 @enderror"
                                   placeholder="Masukkan judul berita...">
                            @error('editTitle') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                            @enderror
                        </div>
                        


                        <!-- Field Konten -->
                        <div>
                            <label for="editText" class="block text-sm font-medium text-gray-700 mb-2">
                                Konten Berita <span class="text-red-500">*</span>
                            </label>
                            <textarea wire:model="editText" 
                                      id="editText"
                                      rows="6"
                                      class="block w-full px-3 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors duration-200 resize-none @error('editText') border-red-500 @else border-gray-300 @enderror"
                                      placeholder="Tulis konten berita di sini..."></textarea>
                            @error('editText') 
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p> 
                            @enderror
                        </div>
                        


                        <!-- Info Gambar Current -->
                        @if($editImage)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Gambar Saat Ini</label>
                                <div class="flex items-center space-x-4 p-4 bg-gray-50 rounded-lg">
                                    <img src="{{ asset('storage/' . $editImage) }}" 
                                         alt="Current image" 
                                         class="h-16 w-16 object-cover rounded-lg border border-gray-200">
                                    <div class="flex-1">
                                        <p class="text-sm font-medium text-gray-900">{{ basename($editImage) }}</p>
                                        <p class="text-xs text-gray-500">Untuk mengubah gambar, gunakan form tambah/edit berita</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        


                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3 pt-6 border-t border-gray-200">
                            
                            <!-- Button Cancel -->
                            <button wire:click="cancelEdit" 
                                    type="button" 
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 font-medium transition-colors duration-200">
                                Batal
                            </button>
                            


                            <!-- Button Save -->
                            <button type="submit" 
                                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 flex items-center">
                                <svg wire:loading wire:target="updateBerita" class="animate-spin -ml-1 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span wire:loading.remove wire:target="updateBerita">Simpan Perubahan</span>
                                <span wire:loading wire:target="updateBerita">Menyimpan...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif

    <!-- Custom CSS untuk line-clamp yang dibutuhkan untuk truncate text -->
    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
</div>