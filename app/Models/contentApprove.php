<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contentApprove extends Model
{
    use HasFactory;

    protected $fillable = [
        'author_id',
        'content_id',
    ];

    public function author(){
        return $this->belongsToMany(Author::class);
    }
    
    public function content(){
        return $this->belongsToMany(Content::class);
    }
}

