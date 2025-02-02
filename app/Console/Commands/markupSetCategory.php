<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use App\Models\Product;
use App\Models\MarkupHistory;

class markupSetCategory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markup:set-category {mark_up} {category}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $mark_up = $this->argument('mark_up');
        $category = $this->argument('category');

        $cat = Category::where('category_name', $category)->first();
        $products = $cat->products;


        MarkupHistory::create([
            'mark_up_rate' => $mark_up,
            'date' => now()
        ]);

        foreach($products as $product){
            $product->retail_price = $product->purchased_price + $mark_up * $product->purchased_price;
            $product->save();
        }

        $this->info("\n Mark up rate set to all of the categories belongs to {$category} \n\n");
    }
}