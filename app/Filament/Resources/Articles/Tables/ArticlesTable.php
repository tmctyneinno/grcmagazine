<?php

namespace App\Filament\Resources\Articles\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Tables\Table;

class ArticlesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable()->limit(12),
                    
                 ImageColumn::make('image')
                    ->getStateUsing(fn ($record) => 
                    $record->image ? asset('storage/' . 
                    $record->image) : null),
               
                    
                TextColumn::make('categories.name')
                    ->label('Categories')
                    ->badge()
                    ->color('primary')
                    ->separator(', '),
                    
                TextColumn::make('published_at')
                    ->date()
                    ->sortable(),
                    
                TextColumn::make('comments_count')
                    ->numeric()
                    ->sortable(),
                    
                IconColumn::make('is_published')
                    ->boolean(),
                    
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}