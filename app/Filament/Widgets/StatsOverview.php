<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\ContactMessage;
use App\Models\Setting;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
 
class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Posts', Article::count())
                ->description('Post')
                ->descriptionIcon('heroicon-o-paint-brush')
                ->color('indigo'),

            Stat::make('Total Contact', ContactMessage::count())
                ->description('Contact Message')
                ->descriptionIcon('heroicon-o-scissors')
                ->color('pink'),
            
        ];
    }
}