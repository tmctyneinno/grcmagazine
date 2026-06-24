<?php

namespace App\Filament\Resources\Articles\Pages;

use App\Filament\Resources\Articles\ArticleResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditArticle extends EditRecord
{
    protected static string $resource = ArticleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }

    // Remove mutateFormDataBeforeFill - not needed

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Only delete old image if a NEW image was uploaded
        if (isset($data['image']) && is_string($data['image'])) {
            $newImage = $data['image'];
            $oldImage = $this->record->getOriginal('image');
            
            // Check if image actually changed
            if ($oldImage && $newImage !== $oldImage) {
                if (Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        }

        return $data;
    }
}