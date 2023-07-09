<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'content_category_id',
        'author_id',
        'title',
        'content',
        'slug',
        'status',
        'image'
    ];

    public function author(){
        return $this->belongsTo(Author::class);
    }

    public function contentCategory(){
        return $this->belongsTo(ContentCategory::class);
    }
}
