<div x-data="{ isUploading: false, progress: 0 }"
     x-on:livewire-upload-start="isUploading = true"
     x-on:livewire-upload-finish="isUploading = false"
     x-on:livewire-upload-error="isUploading = false"
     x-on:livewire-upload-progress="progress = $event.detail.progress">

    <form wire:submit="save">
        <input type="file" wire:model="file">

        <div x-show="isUploading" class="my-2">
            <progress max="100" x-bind:value="progress" class="w-full"></progress>
            <p class="text-sm text-gray-600">Progress: <span x-text="progress"></span>%</p>
        </div>
        <button type="submit">Upload</button>
    </form>

    @if (session()->has('message'))
        <p class="text-green-600 mt-2">{{ session('message') }}</p>
    @endif
</div>
