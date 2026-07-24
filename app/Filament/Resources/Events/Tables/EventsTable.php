<?php

namespace App\Filament\Resources\Events\Tables; // ✅ Correct Namespace

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class EventTable // ✅ Class Name matches Filename
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                
                ImageColumn::make('image')
                    ->getStateUsing(fn ($record) => 
                    $record->image ? asset('storage/' . 
                    $record->image) : null),
                
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()->limit(10),
                
                TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Awards' => 'warning',
                        'Summit' => 'info',
                        'Webinar' => 'success',
                        default => 'gray',
                    }),
                
                TextColumn::make('start_date')
                    ->dateTime('M j, Y')
                    ->sortable()
                    ->label('Date'),
                
                TextColumn::make('location')
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('is_featured')
                    ->boolean()
                    ->label('Featured'),
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