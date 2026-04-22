<?php

namespace App\Filament\Widgets;

use App\Models\Product;
use Filament\Widgets\BarChartWidget;

class ProductsChart extends BarChartWidget
{
    protected ?string $heading = 'Produtos por Mês';

    protected function getData(): array
    {
        $data = Product::query()
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total', 'month');

        $labels = [];
        $values = [];
        foreach (range(1, 12) as $month) {
            $labels[] = now()->setMonth($month)->translatedFormat('F');
            $values[] = $data[$month] ?? 0;
        }

        return [
            'datasets' => [
                [
                    'label' => 'Produtos',
                    'data' => $values,
                ],
            ],
            'labels' => $labels,
        ];
    }
}
