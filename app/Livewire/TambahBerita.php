<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Berita;

class TambahBerita extends Component
{
    use WithFileUploads;

    public $judul, $isi, $gambar;

    public function simpan()
    {
        $this->validate([
            'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|max:2048',
        ]);

        $path = $this->gambar->store('berita', 'public');

        Berita::create([
            'image' => $path,
            'title' => $this->judul,
            'text' => $this->isi,
        ]);

        session()->flash('success', 'Berita berhasil ditambahkan.');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.tambah-berita');
    }
}

