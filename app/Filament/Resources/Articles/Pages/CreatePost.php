<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

// ✅ Class name MUST match filename: CreatePost
class CreatePost extends CreateRecord
{
    protected static string $resource = ArticleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['slug'] = Str::slug($data['title']);
        return $data;
    }

    // ✅ Public access (fixed earlier error)
    public function getTitle(): string
    {
        return 'Create Post';
    }

    public function getHeading(): string
    {
        return 'New Post';
    }
}