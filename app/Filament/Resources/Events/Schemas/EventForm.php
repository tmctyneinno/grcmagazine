<?php

namespace App\Filament\Resources\Events\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class EventForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true),
                
                Select::make('type')
                    ->options([
                        'Conference' => 'Conference',
                        'Awards' => 'Awards Ceremony',
                        'Summit' => 'Summit',
                        'Webinar' => 'Webinar',
                        'Workshop' => 'Workshop',
                    ])
                    ->default('Conference')
                    ->required(),

                // ✅ FIX: Added ->minDate(now()) to prevent past dates
                DatePicker::make('start_date')
                    ->label('Start Date & Time')
                    ->native(false)
                    ->displayFormat('d M Y, h:i A')
                    ->seconds(false)
                    ->minDate(now()) 
                    ->required(),

                // ✅ FIX: Added ->minDate(now()) to prevent past dates
                DatePicker::make('end_date')
                    ->label('End Date & Time')
                    ->native(false)
                    ->displayFormat('d M Y, h:i A')
                    ->seconds(false)
                    ->minDate(now())
                    ->nullable(),

                TextInput::make('venue_name')
                    ->label('Venue Name')
                    ->placeholder('e.g., Leonardo Hotel')
                    ->maxLength(255),

                TextInput::make('location')
                    ->label('Location/City')
                    ->placeholder('e.g., London, UK')
                    ->maxLength(255),

                Textarea::make('description')
                    ->columnSpanFull()
                    ->rows(4),

                FileUpload::make('image')
                    ->label('Event Banner')
                    ->image()
                    ->disk('public')
                    ->directory('events')
                    ->visibility('public')
                    ->maxSize(10240)
                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/webp'])
                    ->columnSpanFull(),

                TextInput::make('registration_url')
                    ->label('Registration/Ticket URL')
                    ->url()
                    ->placeholder('https://...'),

                Toggle::make('is_featured')
                    ->label('Featured on Homepage?')
                    ->default(false),
            ]);
    }
}