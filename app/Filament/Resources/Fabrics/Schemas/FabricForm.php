<?php

namespace App\Filament\Resources\Fabrics\Schemas;

use Filament\Schemas\Schema;

class FabricForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
            ]);
    }
}
