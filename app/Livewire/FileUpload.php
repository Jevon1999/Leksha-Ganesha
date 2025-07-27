<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $file;

    public function save()
    {
        $this->validate([
            'file' => 'required|file|max:10240', // 10MB max
        ]);

        $this->file->store('uploads');

        session()->flash('message', 'File berhasil diupload!');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
