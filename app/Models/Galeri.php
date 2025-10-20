<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model
     */
    protected $table = 'galeris';

    /**
     * Field yang dapat diisi secara mass assignment
     */
    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'views',
    ];

    /**
     * Cast attributes ke tipe data tertentu
     */
    protected $casts = [
        'views' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
