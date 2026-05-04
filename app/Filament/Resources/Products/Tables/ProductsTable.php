<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->height(48)
                    ->width(48)
                    ->visibility('public')
                    ->disk('public'),
                \Filament\Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nome'),
                \Filament\Tables\Columns\TextColumn::make('category.name')
                    ->searchable()
                    ->label('Categoria'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                // EditAction::make(),
            ])
            ->toolbarActions([
                // BulkActionGroup::make([
                //     DeleteBulkAction::make(),
                // ]),
            ]);
    }
}
