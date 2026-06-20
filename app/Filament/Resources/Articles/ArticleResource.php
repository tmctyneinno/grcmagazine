<?php

namespace App\Filament\Resources\Articles;

use App\Filament\Resources\Articles\Pages\CreatePost;
use App\Filament\Resources\Articles\Pages\EditArticle;
use App\Filament\Resources\Articles\Pages\ListArticles;
use App\Filament\Resources\Articles\Pages\ViewArticle;
use App\Filament\Resources\Articles\Schemas\ArticleForm;
use App\Filament\Resources\Articles\Schemas\ArticleInfolist;
use App\Filament\Resources\Articles\Tables\ArticlesTable;
use App\Models\Article;
use BackedEnum; 
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;
    protected static ?string $routePrefix = 'posts';

    // ✅ THESE 3 LINES CHANGE SIDEBAR + ALL LABELS
    protected static ?string $navigationLabel = 'Posts';   // Sidebar name
    protected static ?string $pluralModelLabel = 'Posts';  // Plural name everywhere
    protected static ?string $modelLabel = 'Post';         // Singular name everywhere


    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    
    // ✅ Searchable columns — correct
    protected static ?array $searchable = [
        'title',
        'slug',
        'excerpt',
        'content',
    ]; 

    // ✅ FIXED: Use actual database column name here
    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return ArticleForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ArticleInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ArticlesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }
 
    public static function getPages(): array
    { 
        return [
            'index'  => ListArticles::route('/'),
            'create' => CreatePost::route('/create'),
            'view'   => ViewArticle::route('/{record}'),
            'edit'   => EditArticle::route('/{record}/edit'),
        ];
    } 
}