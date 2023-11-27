<?php

namespace App\Filament\Resources\FiredEmployeesResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NotifiedRelationManager extends RelationManager
{
    protected static string $relationship = 'notified';

    protected static ?string $title = 'Notificações';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('id')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('id')
            ->columns([
                Tables\Columns\TextColumn::make('provider')
                    ->label('Provider'),
                Tables\Columns\TextColumn::make('channel')
                    ->label('Canal'),
                Tables\Columns\TextColumn::make('log')
                    ->label('Log'),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Enviado em'),
            ])
            ->filters([
                //
            ])
            ->headerActions([

            ])
            ->actions([

            ])
            ->bulkActions([

            ]);
    }
}
