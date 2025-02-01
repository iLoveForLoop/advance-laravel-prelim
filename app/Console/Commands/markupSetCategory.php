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
        // $pro = $cat->products;


        $products = Product::where('category_id', $cat->id)->get();
        $markUp = MarkupHistory::create([
            'mark_up_rate' => $mark_up,
            'date' => now()
        ]);

        foreach($products as $product){
            $partial_retail_price = $mark_up * $product->purchased_price;
            $product->retail_price = $product->purchased_price + $partial_retail_price;
            $product->save();
        }

        $markUp->save();

        echo "\n Mark up rate set! to the give category \n\n";
    }
}
