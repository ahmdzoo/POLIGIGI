<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['judul', 'konten', 'image'];

    public function favoritedBy()
{
    return $this->belongsToMany(User::class, 'article_favorites');
}

}