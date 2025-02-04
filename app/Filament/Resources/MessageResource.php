<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Message;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Columns\CheckboxColumn;
use App\Filament\Resources\MessageResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MessageResource\RelationManagers;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationLabel = 'Messages';
    protected static ?string $label = 'Messages';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Checkbox::make("is_readed")
                    ->label("Lu")
                    ->default(true)
                    ->columnSpan(2)
                    ->disabled(),

                TextInput::make("sender_name")
                    ->label("Envoyé par")
                    ->disabled(),

                TextInput::make("sender_email")
                    ->label("Addresse email")
                    ->disabled(),

                Textarea::make("content")
                    ->label("Contenu du message")
                    ->autosize()
                    ->columnSpan(2)
                    ->disabled(),

                Section::make()->label("Réponse")
                    ->schema([

                        Textarea::make("response")
                            ->label("Réponse au message")
                            ->autosize()
                            ->columnSpan(2)
                            ->disabled(fn (Get $get): bool => $get('response') !== null)
                            ->hidden(fn (Get $get): bool => $get('sender_email') == null),

                    ])


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make("sender_name")
                    ->label("Envoyé par"),

                TextColumn::make("sender_email")
                    ->label("Addresse email"),

                TextColumn::make("content")
                    ->label("Contenu du message")
                    ->limit(50),

                CheckboxColumn::make("is_readed")
                    ->label("Lu")
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label("")->mutateRecordDataUsing(function (array $data): array {

                    $model = Message::whereId($data["id"])->first();
                    $model['is_readed'] = true;
                    $model->save();
                    return $data;
                })
                    ->icon('heroicon-m-eye')
                    ->modalHeading('Voir/Répondre message')
                    ->successNotification(Notification::make()
                        ->success()
                        ->title("Envoie de la réponse")
                        ->body("Un email de réponse sera envoyé sur l'addresse mail de l'expéditeur"))
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListMessages::route('/'),
            // 'create' => Pages\CreateMessage::route('/create'),
            // 'edit' => Pages\EditMessage::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
