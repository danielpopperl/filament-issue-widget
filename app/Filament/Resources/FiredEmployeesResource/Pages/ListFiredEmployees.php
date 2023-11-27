<?php

namespace App\Filament\Resources\FiredEmployeesResource\Pages;

use App\Filament\Resources\FiredEmployeesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFiredEmployees extends ListRecords
{
    protected static string $resource = FiredEmployeesResource::class;

    protected function getHeaderActions(): array
    {
        return [];
    }
}
