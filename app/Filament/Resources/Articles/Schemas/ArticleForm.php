<?php

namespace App\Filament\Resources\Articles\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Component;

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                    
                Select::make('categories')
                    ->relationship('categories', 'name')
                    ->multiple()
                    ->preload()
                    ->searchable()
                    ->createOptionForm([
                        TextInput::make('name')->required(),
                        TextInput::make('slug')->required(),
                    ]),
                    
                Textarea::make('excerpt')
                    ->default(null)
                    ->columnSpanFull(),
                    
                RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                    
                FileUpload::make('image')
                    ->label('Post Image')
                    ->image()
                    ->disk('public')
                    ->directory('posts')
                    ->visibility('public')
                    ->required(fn (Component $livewire): bool => 
                        $livewire instanceof \Filament\Resources\Pages\CreateRecord
                    )
                    ->maxSize(10240) // 10MB
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/webp'])
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio(null)
                    ->imageResizeTargetWidth(null)
                    ->imageResizeTargetHeight(null)
                    ->imagePreviewHeight('250')
                    ->loadingIndicatorPosition('center')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadProgressIndicatorPosition('left')
                    ->downloadable()
                    ->openable()
                    ->columnSpanFull(),
                    
                DatePicker::make('published_at')
                    ->required(),
                    
                TextInput::make('comments_count')
                    ->required()
                    ->numeric()
                    ->default(0),
                    
                Toggle::make('is_published')
                    ->required(),
            ]);
    }
}