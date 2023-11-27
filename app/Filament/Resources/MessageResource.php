<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessageResource\Pages;
use App\Filament\Resources\MessageResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessageResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-s-clipboard-document-check';

    protected static ?string $navigationGroup = 'Desligamento';

    protected static ?string $recordTitleAttribute = 'number';

    protected static ?string $navigationLabel = 'Pesquisas respondidas';

    protected static ?string $label = 'pesquisas respondidas';

    protected static ?string $pluralModelLabel = 'pesquisas respondidas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Fieldset::make('Colaborador')
                    ->schema([
                        Placeholder::make('employee')
                            ->content(fn (Message $record): string => $record->fired_employee->name)
                            ->label('Nome'),
                        Placeholder::make('cpf')
                            ->content(fn (Message $record): string => $record->fired_employee->cpf)
                            ->label('CPF'),
                        Placeholder::make('directorship')
                            ->content(fn (Message $record): string => $record->fired_employee->directorship)
                            ->label('Diretoria'),
                    ])->columns(1),
                    Fieldset::make('Pesquisa')
                    ->schema([
                        Repeater::make('message')
                        ->label('Perguntas/Respostas')
                        ->schema([
                            TextInput::make('question')
                                ->label('Pergunta')
                                ->disabled(),
                            TextInput::make('answer')
                                ->label('Resposta')
                                ->disabled(),
                        ])->columns(2)
                        ->addable(false)
                        ->deletable(false)
                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('fired_employee.directorship')
                    ->label('Diretoria'),
                TextColumn::make('fired_employee.name')
                    ->label('Colaborador')
                    ->searchable(),
                TextColumn::make('identifier')
                    ->label('CPF')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Iniciou em')
                    ->dateTime('d/m/Y H:m:s')
                    ->sortable(),
                TextColumn::make('updated_at')
                    ->label('Concluiu em')
                    ->dateTime('d/m/Y H:m:s')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'create' => Pages\CreateMessage::route('/create'),
            'edit' => Pages\EditMessage::route('/{record}/edit'),
            'view' => Pages\ViewMessage::route('/{record}'),
        ];
    }    
}
