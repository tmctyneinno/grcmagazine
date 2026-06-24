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

class ArticleForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                // TextInput::make('slug')
                //     ->required(),
                Select::make('categories')
                    ->relationship('categories', 'name') // uses the belongsToMany relation
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
                    ->directory('posts')
                    ->visibility('public')
                    ->required()
                    ->imageResizeMode('cover')
                    ->imagePreviewHeight('250')
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
