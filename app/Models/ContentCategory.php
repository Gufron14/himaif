<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'author_id'
    ];

    public function contents(){
        return $this->hasMany(Content::class);
    }
}
