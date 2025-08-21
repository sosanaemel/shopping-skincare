<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
class CategorySeeder extends Seeder
{

    public function run(): void
    {
        $categories = ['category 1','category 2','category 3','category 4','category 5','category 6'];

        $category_ids = [];
        foreach ($categories as  $category)
        {
           $newCategory = Category::create(['name' => $category ]);
            $category_ids[] = $newCategory->id ;
        }

        $products = Product::get();
        $index = 0;

        foreach ($products as $product)
        {
            $product->category_id = $category_ids[$index];
            $product->save();

            $index++;
            if ( $index==6){
                $index=0;
            }
        }

    }
}
