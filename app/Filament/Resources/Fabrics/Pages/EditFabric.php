<?php

namespace App\Filament\Resources\Fabrics\Pages;

use App\Filament\Resources\Fabrics\FabricResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFabric extends EditRecord
{
    protected static string $resource = FabricResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
