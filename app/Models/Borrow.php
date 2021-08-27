<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'book_id',
        'return',
        'deadline',
        'period',
    ];

    protected $hidden = [
        'user_id',
        'book_id',
    ];

    protected $casts = [
        'return' => 'dateTime',
        'deadline' => 'dateTime',
        'period' => 'dateTime',
    ];

    public function book()
    {
        return $this->hasMany(App\Model\Books::class);
    }

    public function user()
    {
        return $this->hasMany(App\Model\User::class);
    }
}
