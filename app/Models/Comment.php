<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'name',
        'email',
        'website',
        'content',
        'status',
    ];

    // Relationship: A comment belongs to one Article
    public function article()
    {
        return $this->belongsTo(Article::class, 'post_id');
    }
}