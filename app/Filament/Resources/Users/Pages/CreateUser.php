<?php

namespace App\Filament\Resources\Users\Pages;

use App\Filament\Resources\Users\UserResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Actions;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;

    public function getCreateFormActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
