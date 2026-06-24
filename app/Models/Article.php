<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected static function booted()
    {
        static::creating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
         
        static::updating(function ($article) {
            $article->slug = Str::slug($article->title);
        });
    }

    protected $fillable = [
        'title', 'slug', 'description', 'excerpt', 'content', 'image', 'published_at', 'comments_count', 'is_published'
    ];

    protected $casts = [
        'published_at' => 'date',
        'is_published' => 'boolean',
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'article_category');
    }
}