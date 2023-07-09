<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'angkatan',
        'phone',
        'alamat',
        'username',
        'password',
        'avatar'
    ];

    public function contents(){
        return $this->hasMany(Content::class);
    }

    public function contentCategories(){
        return $this->hasMany(ContentCategory::class);
    }
}
