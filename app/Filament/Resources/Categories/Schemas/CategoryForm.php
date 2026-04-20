<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('slug')
                    ->label('Slug')
                    ->maxLength(255),
                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Descrição')
                    ->maxLength(65535),
            ]);
    }
}
