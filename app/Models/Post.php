<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'slug', 'image', 'body', 'published_at', 'featured'];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function types()
    {
        return $this->belongsToMany(Type::class, 'type_post');
    }

    public function scopePublished($query)
    {
        $query->where('published_at', '<=', Carbon::now());
    }

    public function scopeFeatured($query)
    {
        $query->where('featured', true);
    }

    public function scopeWithType($query, string $type)
    {
        $query->whereHas('types', function ($query) use ($type) {
            $query->where('slug', $type);
        });
    }

    public function getExcerpt()
    {
        return Str::limit(strip_tags($this->body), 150);
    }

    public function getReadingTime()
    {
        $mins = round(str_word_count($this->body) / 250);

        return $mins < 1 ? 1 : $mins;
    }

    public function getWordCount()
    {
        $words = str_word_count($this->body);

        return $words;
    }

    public function getPublishedAtVNFormat()
    {
        Carbon::setLocale('vi');

        return $this->published_at->diffForHumans();
    }

    public function getThumbnailImage()
    {
        $urlImage = str_contains($this->image, 'http');

        return $urlImage ? $this->image : Storage::disk('public')->url($this->image);
    }
}
