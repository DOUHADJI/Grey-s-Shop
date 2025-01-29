<?php

namespace App\Filament\Resources;

use App\Models\Post;
use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\PostResource\Pages;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Posts';
    protected static ?string $pluralLabel = 'Posts';
    protected static ?string $label = 'Article';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make('Informations principales')
                    ->schema([

                        Select::make('category_id')
                            ->label('Catégorie')
                            ->options(Category::pluck('name', 'id'))
                            ->nullable()
                            ->columnSpan(2),

                        Select::make('tags')
                            ->label('Tags')
                            ->multiple()
                            ->relationship('tags', 'name')
                            ->preload()
                            ->columnSpan(2),

                        FileUpload::make('image')
                            ->label('Image')
                            ->image()
                            ->required()
                            ->maxSize(1024)
                            ->disk('public')
                            ->directory('posts')
                            ->columnSpan(4),
                    ])
                    ->columns(4),

                Section::make('Détails de l\'article')
                    ->schema([

                        TextInput::make('title')
                            ->label('Titre')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->columnSpan(4),

                        TextInput::make('slug')
                            ->label('Slug')
                            ->nullable()
                            ->maxLength(255)
                            ->columnSpan(4),

                        Textarea::make('resume')
                            ->label('Résumé')
                            ->required()
                            ->maxLength(500)
                            ->columnSpan(2),
                    ])
                    ->columns(4),

                Section::make('Contenu')
                    ->schema([

                        RichEditor::make('content')
                            ->label('Contenu')
                            ->required()
                            ->columnSpan(4),
                    ])
                    ->columns(4),

                Section::make('Publication')
                    ->schema([

                        Toggle::make('is_published')
                            ->label('Publié')
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
                ImageColumn::make('image')
                    ->label('Image'),

                TextColumn::make('title')
                    ->label('Titre')
                    ->limit(23)
                    ->sortable()
                    ->searchable(),

                TextColumn::make('likes_count')
                    ->label('👍 Likes')
                    ->counts('likes', fn($query) => $query->where('type', 'yes'))
                    ->sortable(),

                IconColumn::make('is_published')
                    ->label('Publié')
                    ->boolean(),

                TextColumn::make('category.name')
                    ->label('Catégorie')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('updated_at')
                    ->label('Dernière modification')
                    ->dateTime()
                    ->sortable(),
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
            'index' => Pages\ListPosts::route('/'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Gestion des posts';
    }

    public static function getNavigationSort(): int
    {
        return 3;
    }

    public static function getNavigationBadge(): ?string
    {
        return Post::count();
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Gestion du Blog';
    }
}
