<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Product;

#[Signature('app:uuid-products')]
#[Description('Assign UUIDs to all products without one')]
class UuidProducts extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $products = Product::whereNull('uuid')->get();
        
        foreach ($products as $product) {
            $product->uuid = (string) \Illuminate\Support\Str::uuid();
            $product->save();
        }
        
        $this->info('UUIDs have been assigned to all products without one.');
    }
}
