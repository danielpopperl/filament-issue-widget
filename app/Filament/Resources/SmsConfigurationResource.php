<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SmsConfigurationResource\Pages;
use App\Filament\Resources\SmsConfigurationResource\RelationManagers;
use App\Models\SmsConfiguration;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SmsConfigurationResource extends Resource
{
    protected static ?string $model = SmsConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $recordTitleAttribute = 'number';

    protected static ?string $navigationLabel = 'Comunicação via SMS';

    protected static ?string $label = 'Comunicação via SMS';

    protected static ?string $pluralModelLabel = 'Comunicação via SMS';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->columns(1)
                ->schema([
                    Select::make('provider')
                        ->label('Provider')
                        ->options([
                            'Amazon SNS' => 'Amazon SNS',
                            'Marketing Cloud' => 'Marketing Cloud',
                        ]),
                    Textarea::make('message')
                        ->label('Mensagem')
                        ->maxLength(120)
                        ->rows(10)
                        ->cols(20),
                    Toggle::make('is_active')
                        ->label('Comunicação ativa?')
                ])  
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('provider')
                    ->label('Provider'),
                TextColumn::make('message')
                    ->label('Mensagem')
                    ->limit(20),
                ToggleColumn::make('is_active')
                    ->label('Comunicação ativa?')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageSmsConfigurations::route('/'),
        ];
    }    
}
