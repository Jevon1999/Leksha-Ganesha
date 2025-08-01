<div class="space-y-4">
    @if (session()->has('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    <input type="text" wire:model="judul" placeholder="Judul Berita" class="w-full p-2 border rounded">
    @error('judul') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <textarea wire:model="isi" placeholder="Isi Berita" class="w-full p-2 border rounded"></textarea>
    @error('isi') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <input type="file" wire:model="gambar" class="w-full border rounded">
    @error('gambar') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

    <button wire:click="simpan" class="bg-blue-500 text-white px-4 py-2 rounded">
        Simpan
    </button>
</div>
