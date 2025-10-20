<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Galeri;
use Illuminate\Support\Facades\Storage;

/**
 * Komponen Livewire untuk mengelola galeri
 * Menyediakan fitur CRUD (Create, Read, Update, Delete) untuk galeri dengan upload gambar
 */
class GaleriUpload extends Component
{
    use WithPagination, WithFileUploads;



    // Properties untuk pencarian dan filter data
    public $search = '';
    public $categoryFilter = '';
    public $sortField = 'created_at';
    public $sortDirection = 'desc';
    public $perPage = 12;



    // Properties untuk form upload/edit galeri
    public $showUploadModal = false;
    public $showEditModal = false;
    public $showDeleteModal = false;
    public $galeriToDelete = null;



    // Properties form
    public $galeriId = null;
    public $title = '';
    public $description = '';
    public $category = 'Umum';
    public $image = null;
    public $existingImage = null;



    // Daftar kategori yang tersedia
    public $categories = [
        'Umum',
        'Batik Tulis',
        'Batik Cap',
        'Batik Kombinasi',
        'Proses Pembuatan',
        'Produk Jadi',
        'Event & Workshop',
        'Lainnya',
    ];



    /**
     * Rules validasi untuk form upload dan edit
     */
    protected function rules()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string',
        ];

        if ($this->galeriId) {
            // Untuk edit, gambar optional
            $rules['image'] = 'nullable|image|max:2048';
        } else {
            // Untuk create, gambar wajib
            $rules['image'] = 'required|image|max:2048';
        }

        return $rules;
    }



    /**
     * Custom validation messages
     */
    protected $messages = [
        'title.required' => 'Judul galeri wajib diisi',
        'category.required' => 'Kategori wajib dipilih',
        'image.required' => 'Gambar wajib diupload',
        'image.image' => 'File harus berupa gambar',
        'image.max' => 'Ukuran gambar maksimal 2MB',
    ];



    /**
     * Reset pagination ketika search berubah
     */
    public function updatingSearch()
    {
        $this->resetPage();
    }



    /**
     * Reset pagination ketika filter kategori berubah
     */
    public function updatingCategoryFilter()
    {
        $this->resetPage();
    }



    /**
     * Fungsi untuk sorting
     */
    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }
    }



    /**
     * Menampilkan modal upload
     */
    public function showUpload()
    {
        $this->resetForm();
        $this->showUploadModal = true;
    }



    /**
     * Menutup modal upload
     */
    public function closeUploadModal()
    {
        $this->showUploadModal = false;
        $this->resetForm();
    }



    /**
     * Reset form
     */
    private function resetForm()
    {
        $this->galeriId = null;
        $this->title = '';
        $this->description = '';
        $this->category = 'Umum';
        $this->image = null;
        $this->existingImage = null;
        $this->resetErrorBag();
    }



    /**
     * Upload galeri baru
     */
    public function uploadGaleri()
    {
        $this->validate();

        // Upload gambar
        $imagePath = $this->image->store('galeri', 'public');

        // Simpan ke database
        Galeri::create([
            'title' => $this->title,
            'description' => $this->description,
            'category' => $this->category,
            'image' => $imagePath,
        ]);

        session()->flash('message', 'Galeri berhasil diupload!');
        session()->flash('type', 'success');

        $this->closeUploadModal();
    }



    /**
     * Menampilkan modal edit
     */
    public function editGaleri($galeriId)
    {
        $galeri = Galeri::find($galeriId);

        if ($galeri) {
            $this->galeriId = $galeri->id;
            $this->title = $galeri->title;
            $this->description = $galeri->description;
            $this->category = $galeri->category;
            $this->existingImage = $galeri->image;
            $this->showEditModal = true;
        }
    }



    /**
     * Menutup modal edit
     */
    public function closeEditModal()
    {
        $this->showEditModal = false;
        $this->resetForm();
    }



    /**
     * Update galeri
     */
    public function updateGaleri()
    {
        $this->validate();

        $galeri = Galeri::find($this->galeriId);

        if ($galeri) {
            $updateData = [
                'title' => $this->title,
                'description' => $this->description,
                'category' => $this->category,
            ];

            // Jika ada gambar baru
            if ($this->image) {
                // Hapus gambar lama
                if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                    Storage::disk('public')->delete($galeri->image);
                }

                // Upload gambar baru
                $updateData['image'] = $this->image->store('galeri', 'public');
            }

            $galeri->update($updateData);

            session()->flash('message', 'Galeri berhasil diupdate!');
            session()->flash('type', 'success');

            $this->closeEditModal();
        }
    }



    /**
     * Menampilkan modal konfirmasi delete
     */
    public function confirmDelete($galeriId)
    {
        $this->galeriToDelete = $galeriId;
        $this->showDeleteModal = true;
    }



    /**
     * Menutup modal delete
     */
    public function cancelDelete()
    {
        $this->showDeleteModal = false;
        $this->galeriToDelete = null;
    }



    /**
     * Hapus galeri
     */
    public function deleteGaleri()
    {
        if ($this->galeriToDelete) {
            $galeri = Galeri::find($this->galeriToDelete);

            if ($galeri) {
                // Hapus file gambar
                if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
                    Storage::disk('public')->delete($galeri->image);
                }

                // Hapus dari database
                $galeri->delete();

                session()->flash('message', 'Galeri berhasil dihapus!');
                session()->flash('type', 'success');
            }
        }

        $this->cancelDelete();
    }



    /**
     * Render view dengan data galeri
     */
    public function render()
    {
        $galeris = Galeri::query()
            ->when($this->search, function ($query) {
                $query->where('title', 'like', '%' . $this->search . '%')
                      ->orWhere('description', 'like', '%' . $this->search . '%');
            })
            ->when($this->categoryFilter, function ($query) {
                $query->where('category', $this->categoryFilter);
            })
            ->orderBy($this->sortField, $this->sortDirection)
            ->paginate($this->perPage);

        return view('livewire.galeri-upload', compact('galeris'));
    }
}
