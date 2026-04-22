<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use Filament\Widgets\PieChartWidget;

class CategoriesChart extends PieChartWidget
{
    protected ?string $heading = 'Produtos por Categoria';

    protected function getData(): array
    {
        $data = Category::withCount('products')->get();

        return [
            'datasets' => [
                [
                    'label' => 'Produtos',
                    'data' => $data->pluck('products_count')->toArray(),
                ],
            ],
            'labels' => $data->pluck('name')->toArray(),
        ];
    }
}
