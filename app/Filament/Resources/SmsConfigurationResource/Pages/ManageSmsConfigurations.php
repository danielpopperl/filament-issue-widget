<?php

namespace App\Filament\Resources\SmsConfigurationResource\Pages;

use App\Filament\Resources\SmsConfigurationResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageSmsConfigurations extends ManageRecords
{
    protected static string $resource = SmsConfigurationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            
        ];
    }
}
