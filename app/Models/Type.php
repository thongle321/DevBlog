<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'type_post');
    }
}
