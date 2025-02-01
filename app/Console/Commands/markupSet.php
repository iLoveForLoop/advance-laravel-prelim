<?php

namespace App\Console\Commands;

use App\Models\MarkupHistory;
use App\Models\Product;
use Illuminate\Console\Command;

class markupSet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'markup:set {mark_up}';

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

        $products = Product::all();
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

        echo "\n Mark up rate set!";

    }
}
