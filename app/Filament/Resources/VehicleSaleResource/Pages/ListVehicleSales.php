<?php

namespace App\Filament\Resources\VehicleSaleResource\Pages;

use App\Filament\Resources\VehicleSaleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVehicleSales extends ListRecords
{
    protected static string $resource = VehicleSaleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
