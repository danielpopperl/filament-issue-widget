<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EmailConfigurationResource\Pages;
use App\Filament\Resources\EmailConfigurationResource\RelationManagers;
use App\Models\EmailConfiguration;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
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

class EmailConfigurationResource extends Resource
{
    protected static ?string $model = EmailConfiguration::class;

    protected static ?string $navigationIcon = 'heroicon-s-envelope';

    protected static ?string $navigationGroup = 'Configurações';

    protected static ?string $recordTitleAttribute = 'number';

    protected static ?string $navigationLabel = 'Comunicação via E-mail';

    protected static ?string $label = 'Comunicação via E-mail';

    protected static ?string $pluralModelLabel = 'Comunicação via E-mail';

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
                            'Amazon SES' => 'Amazon SES',
                            'Marketing Cloud' => 'Marketing Cloud',
                        ]),
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
                Tables\Actions\BulkActionGroup::make([
                ]),
            ]);
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageEmailConfigurations::route('/'),
        ];
    }    
}
