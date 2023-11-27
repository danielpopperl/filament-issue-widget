<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FiredEmployeesResource\Pages;
use App\Filament\Resources\FiredEmployeesResource\RelationManagers\NotifiedRelationManager;
use App\Models\FiredEmployees;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class FiredEmployeesResource extends Resource
{
    protected static ?string $model = FiredEmployees::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'Desligamento';

    protected static ?string $recordTitleAttribute = 'number';

    protected static ?string $navigationLabel = 'Colaboradores desligados';

    protected static ?string $label = 'desligado';

    protected static ?string $pluralModelLabel = 'desligados';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                IconColumn::make('notified')
                    ->label('Notificado?')
                    ->boolean(),
                IconColumn::make('responded')
                    ->label('Respondeu?')
                    ->boolean(),
                ToggleColumn::make('notifiable')
                    ->label('Recebe notificação?'),
                TextColumn::make('business')
                    ->label('Empresa')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('register')
                    ->label('Chapa')
                    ->sortable(),
                TextColumn::make('directorship')
                    ->label('Diretoria')
                    ->sortable(),
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('cpf')
                    ->label('CPF')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('cellphone')
                    ->label('Celular')
                    ->getStateUsing(fn (FiredEmployees $record) => $record->getPhoneFormatted() ?? null)
                    ->sortable(),
                TextColumn::make('pis')
                    ->label('PIS')
                    ->sortable(),
                TextColumn::make('birth')
                    ->label('Nascimento')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('admission')
                    ->label('Admissão')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('demission')
                    ->label('Demissão')
                    ->dateTime('d/m/Y')
                    ->sortable(),
                TextColumn::make('situation')
                    ->label('Situação')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('cod_function')
                    ->label('Cod. função')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('desc_function')
                    ->label('Desc. função')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('position')
                    ->label('Posição')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('cost_center')
                    ->label('Centro de custo')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('presidency')
                    ->label('Presidência')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('vice-presidency')
                    ->label('Vice-presidência')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('management')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->label('Gerência')
                    ->sortable(),
                TextColumn::make('coordination')
                    ->label('Coordenadoria')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('supervision')
                    ->label('Supervisão')
                    ->toggleable()
                    ->toggledHiddenByDefault()
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Importado em')
                    ->dateTime('d/m/Y H:m:s')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    ExportBulkAction::make()
                ]),
            ]);
    }
    public static function getRelations(): array
    {
        return [
            NotifiedRelationManager::class
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFiredEmployees::route('/'),
            'edit' => Pages\EditFiredEmployees::route('/{record}/edit'),
        ];
    }    
}
