<?php

namespace App\Filament\Pages;

use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Support\Exceptions\Halt;
use App\Models\Config as ModelsConfig;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Notifications\Notification;
use Filament\Forms\Concerns\InteractsWithForms;

class GeneralSettings extends Page implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationLabel = 'Paramètres généraux';
    protected static ?string $title = 'Paramètres généraux';

    protected static string $view = 'filament.pages.general-settings';

    public function mount(): void
    {
        $config = ModelsConfig::first();
        if ($config) {
            $this->form->fill($config->attributesToArray());
        }
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("Paramètres généraux du site")->schema([
                    FileUpload::make('logo')
                        ->label('Logo')
                        ->directory('logos')
                        ->image()
                        ->nullable()
                        ->columnSpan(2),

                    TextInput::make('name')
                        ->label('Nom du site')
                        ->required()
                        ->maxLength(255),

                    TextInput::make('slogan')
                        ->label('Slogan')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('email')
                        ->label('Email')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('contact')
                        ->label('Contact')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('address')
                        ->label('Adresse')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('facebook_page_link')
                        ->label('Page Facebook')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('youtube_page_link')
                        ->label('Page YouTube')
                        ->nullable()
                        ->maxLength(255),

                    TextInput::make('instagram_page_link')
                        ->label('Page Instagram')
                        ->nullable()
                        ->maxLength(255),
                ])
                ->columns(2),
            ])
            ->statePath('data');
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label(__('Sauvegarder'))
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        try {
            $data = $this->form->getState();
            $config = ModelsConfig::first();
            if ($config) {
                $config->update([
                    'name' => $data['name'],
                    'slogan' => $data['slogan'],
                    'logo' => $data['logo'],
                    'email' => $data['email'],
                    'contact' => $data['contact'],
                    'address' => $data['address'],
                    'facebook_page_link' => $data['facebook_page_link'],
                    'youtube_page_link' => $data['youtube_page_link'],
                    'instagram_page_link' => $data['instagram_page_link'],
                ]);
            } else {
                ModelsConfig::create($data);
            }

        } catch (Halt $exception) {
            return;
        }

        Notification::make()
            ->success()
            ->title(__('Les paramètres ont été sauvegardés avec succès'))
            ->send();
    }

    public static function getNavigationGroup() : string
    {
        return "Paramêtres";
    }
}
