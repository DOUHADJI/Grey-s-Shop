<?php

namespace App\Filament\Resources;

use Filament\Forms\Set;
use App\Models\Category;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use App\Filament\Resources\CategoryResource\Pages;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Catégories';
    protected static ?string $pluralLabel = 'Catégories';
    protected static ?string $label = 'Catégorie';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nom')
                    ->required()
                    ->maxLength(255)
                    ->live(onBlur: true)
    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->disabled(),

                Textarea::make('description')
                    ->label('Description')
                    ->nullable()
                    ->maxLength(500),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->required()
                    ->maxSize(1024)
                    ->disk('public')
                    ->directory('categories')
                // ->imageResizeTargetWidth(161)
                // ->imageResizeTargetHeight(160)
                // ->imageCropAspectRatio('161:160'),
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

                TextColumn::make('name')
                    ->label('Nom')
                    ->sortable()
                    ->searchable(),

                    TextColumn::make('products_count')
                    ->label('Nombre d\'articles')
                    ->getStateUsing(function ($record) {
                        return $record->articles()->count();
                    })
                    ->sortable(),

                TextColumn::make('posts_count')
                    ->label('Nombre de posts')
                    ->getStateUsing(function ($record) {
                        return $record->posts()->count();
                    })
                    ->sortable(),


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
            'index' => Pages\ListCategories::route('/'),
            //  'create' => Pages\CreateCategory::route('/create'),
            //  'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationLabel(): string
    {
        return 'Gestion des catégories';
    }

    public static function getNavigationSort(): int
    {
        return 2;
    }

    public static function getNavigationBadge(): ?string
    {
        return Category::count();
    }
}
