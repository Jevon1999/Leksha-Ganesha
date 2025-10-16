<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

/**
 * Komponen Livewire untuk mengelola daftar berita
 * Menyediakan fitur CRUD (Create, Read, Update, Delete) untuk berita
 * dengan pagination, pencarian, dan sorting
 */
class BeritaList extends Component
{
    use WithPagination;



    // Properties untuk pencarian dan filter data
    public $search = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 10;



    // Properties untuk modal konfirmasi delete
    public $showDeleteModal = false;
    public $beritaToDelete = null;



    // Properties untuk modal edit berita
    public $showEditModal = false;
    public $editBeritaId = null;
    public $editTitle = '';
    public $editText = '';
    public $editImage = '';



    /**
     * Rules validasi untuk form edit berita
     * Memastikan data yang diinput valid sebelum disimpan
     */
    protected $rules = [
        'editTitle' => 'required|string|max:255',
        'editText' => 'required|string',
    ];



    /**
     * Reset pagination ketika search query berubah
     * Memastikan user kembali ke halaman pertama saat melakukan pencarian baru
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }



    /**
     * Fungsi untuk mengubah urutan sorting
     * Toggle antara ascending dan descending untuk field yang sama
     * 
     * @param string $field - Field yang akan dijadikan acuan sorting
     */
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            // Jika field yang sama diklik, toggle direction
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            // Jika field berbeda, set field baru dengan direction ascending
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }



    /**
     * Menampilkan modal konfirmasi delete
     * Menyimpan ID berita yang akan dihapus untuk konfirmasi
     * 
     * @param int $beritaId - ID berita yang akan dihapus
     */
    public function confirmDelete($beritaId)
    {
        $this->beritaToDelete = $beritaId;
        $this->showDeleteModal = true;
    }



    /**
     * Menutup modal konfirmasi delete
     * Reset property yang terkait dengan delete modal
     */
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->beritaToDelete = null;
    }



    /**
     * Menghapus berita dari database
     * Termasuk menghapus file gambar dari storage jika ada
     */
    public function deleteBerita()
    {
        if ($this->beritaToDelete) {
            $berita = Berita::find($this->beritaToDelete);
            
            if ($berita) {
                // Hapus file gambar dari storage jika ada
                if ($berita->image && Storage::disk('public')->exists($berita->image)) {
                    Storage::disk('public')->delete($berita->image);
                }
                
                // Hapus data berita dari database
                $berita->delete();
                
                // Tampilkan notifikasi sukses
                session()->flash('message', 'Berita berhasil dihapus!');
                session()->flash('type', 'success');
            }
        }
        
        // Reset modal state
        $this->cancelDelete();
    }



    /**
     * Menampilkan modal edit berita
     * Load data berita yang akan diedit ke form
     * 
     * @param int $beritaId - ID berita yang akan diedit
     */
    public function editBerita($beritaId)
    {
        $berita = Berita::find($beritaId);
        
        if ($berita) {
            $this->editBeritaId = $berita->id;
            $this->editTitle = $berita->title;
            $this->editText = $berita->text;
            $this->editImage = $berita->image;
            $this->showEditModal = true;
        }
    }



    /**
     * Menutup modal edit berita
     * Reset semua property yang terkait dengan form edit
     */
    public function cancelEdit()
    {
        $this->showEditModal = false;
        $this->editBeritaId = null;
        $this->editTitle = '';
        $this->editText = '';
        $this->editImage = '';
        $this->resetErrorBag();
    }



    /**
     * Menyimpan perubahan data berita yang diedit
     * Validasi data terlebih dahulu sebelum disimpan
     */
    public function updateBerita()
    {
        // Validasi input data
        $this->validate();
        
        $berita = Berita::find($this->editBeritaId);
        
        if ($berita) {
            // Update data berita
            $berita->update([
                'title' => $this->editTitle,
                'text' => $this->editText,
            ]);
            
            // Tampilkan notifikasi sukses
            session()->flash('message', 'Berita berhasil diupdate!');
            session()->flash('type', 'success');
            
            // Tutup modal edit
            $this->cancelEdit();
        }
    }



    /**
     * Render view dengan data berita yang sudah difilter dan dipaginasi
     * Menggunakan layout sidebar untuk tampilan admin
     * 
     * @return \Illuminate\View\View
     */
    public function render()
    {
        // Query berita dengan filter pencarian dan sorting
        $beritas = Berita::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('text', 'like', '%' . $this->search . '%');
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.berita-list', compact('beritas'));
    }
}