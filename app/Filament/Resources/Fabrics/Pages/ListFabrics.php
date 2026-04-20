<?php

namespace App\Filament\Resources\Fabrics\Pages;

use App\Filament\Resources\Fabrics\FabricResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFabrics extends ListRecords
{
    protected static string $resource = FabricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
