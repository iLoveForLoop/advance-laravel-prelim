<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::insert([
            ["category_name" => "Canned goods",
            "description" => "this is a description for canned goods"],

            ["category_name" => "Drinks",
            "description" => "this is a description for drinks"],

            ["category_name" => "Clothing",
            "description" => "this is a description for clothing"],
        ]
    );
    }
}