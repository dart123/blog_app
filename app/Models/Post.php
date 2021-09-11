<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    public function metas() {
        return $this->hasMany(PostMeta::class);
    }
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
