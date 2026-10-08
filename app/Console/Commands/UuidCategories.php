<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Models\Category;

#[Signature('app:uuid-categories')]
#[Description('Assign UUIDs to all categories without one')]
class UuidCategories extends Command
{
    /**
     * Execute the console command.
     */
    public function handle()
    {
        $categories = Category::whereNull('uuid')->get();
        
        foreach ($categories as $category) {
            $category->uuid = (string) \Illuminate\Support\Str::uuid();
            $category->save();
        }
        
        $this->info('UUIDs have been assigned to all categories without one.');
    }
}
