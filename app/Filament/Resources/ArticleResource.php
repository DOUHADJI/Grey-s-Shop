<?php

namespace App\Filament\Resources;

use App\Models\Article;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\ArticleResource\Pages;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-group';
    protected static ?string $navigationLabel = 'Articles';
    protected static ?string $pluralLabel = 'Articles';
    protected static ?string $label = 'Article';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Informations principales')
                    ->schema([

                        TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(4),

                        Select::make('category_id')
                            ->label('Catégorie')
                            ->required()
                            ->relationship('category', 'name')
                            ->columnSpan(4),
                    ])
                    ->columns(4),

                Section::make('Description')
                    ->schema([

                        Textarea::make('description')
                            ->label('Description')
                            ->required()
                            ->rows(5)
                            ->columnSpan(4),

                        FileUpload::make('image')
                            ->label('Image')
                            ->directory('articles')
                            ->required()
                            ->columnSpan(4),
                    ])
                    ->columns(4),

                Section::make('Prix')
                    ->schema([

                        TextInput::make('price')
                            ->label('Prix')
                            ->numeric()
                            ->step(0.01)
                            ->required()
                            ->columnSpan(4),
                    ])
                    ->columns(4),

                Section::make('Options')
                    ->schema([
                        Checkbox::make('is_featured')
                            ->label('Article en vedette')
                            ->default(false)
                            ->columnSpan(4),
                    ])
                    ->columns(4),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('title')
                    ->label('Titre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->sortable()
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Image')
                    ->square(),
                BadgeColumn::make('view_count')
                    ->label('Vues')
                    ->color('success')
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Prix')
                    ->money('XOF', true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Créé le')
                    ->dateTime()
                    ->sortable(),

                ToggleColumn::make('is_featured')
                    ->label('Article en vedette')
                    ->sortable()
                    ->default(false)
                    ->toggleable()
                    ->color('primary')
                    ->after('price'),
            ])
            ->actions([
                EditAction::make()
                    ->icon('heroicon-o-pencil')
                    ->label(''),
                DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->label(''),
            ])
            ->bulkActions([
                DeleteBulkAction::make(),
            ]);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Gestion des articles';
    }

    public static function getNavigationSort(): int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return Article::count();
    }
}
