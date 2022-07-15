<?php

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = config('db.piatti');

        foreach ($products as $product) {
            $new_product = new Product();
            $new_product->name = $product['name'];
            $new_product->slug = Str::slug($new_product->name, '-');
            $new_product->cover_img = $product['cover_img'];
            $new_product->price = $product['price'];
            $new_product->visibility = $product['visibility'];
            $new_product->description = $product['description'];
            $new_product->save(); 
        }
    }
}
