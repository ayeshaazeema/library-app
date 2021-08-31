<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;

    // Kolom Database yang bisa diisi secara massal
    protected $fillable = [
        'nisbn',
        'title',
        'description',
        'image_url',
        'rating',
        'stock',
        'publisher_id',
        'author_id'
    ];

    // Kolom database yang seharusnya tidak ditampilkan pada JSON
    protected $hidden = [
        'author_id',
        'publisher_id',
    ];

    // Kolom database yang perlu dikonversi menjadi tipe data tertentu
    protected $casts = [
        'rating' => 'double',
        'stock' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(Authors::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publishers::class);
    }
}
