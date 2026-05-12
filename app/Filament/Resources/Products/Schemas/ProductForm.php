<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->label('Imagem'),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->label('Nome'),

                Forms\Components\Textarea::make('description')
                    ->label('Descrição'),


                Forms\Components\TextInput::make('price')
                    ->prefix('R$')
                    ->required()
                    ->label('Preço')
                    ->rule('regex:/^\d{1,3}(\.\d{3})*,\d{2}$/')
                    ->helperText('Exemplo: 1.234,56'),

                Forms\Components\TextInput::make('quantity')
                    ->required()
                    ->label('Quantidade')
                    ->numeric()
                    ->default(0)
                    ->minValue(0),

                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name', fn ($query) => $query->orderBy('name'))
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Nome da Categoria'),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->unique(table: 'categories', column: 'slug')
                            ->label('Slug')
                            ->placeHolder('ex: mini-necessaire'),
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição'),
                    ])
                    ->required()
                    ->label('Categoria'),

                Forms\Components\Select::make('fabrics')
                    ->relationship('fabrics', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->label('Nome do Tecido'),
                    ])
                    ->label('Tecidos Disponíveis'),

                Forms\Components\Select::make('status')
                    ->options([
                        null => 'Nenhum',
                        'promotion' => 'Promoção',
                        'new' => 'Novo',
                        'latest' => 'Lançamento',
                    ])
                    ->label('Status')
                    ->default(null),
            ]);
    }
}
