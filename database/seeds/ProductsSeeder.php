<?php

use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->delete();
        
        $products = [
            [ 'name' => 'Banana', 'image' => 'img/featured/feature-2.jpg', 'price' => 30000 ],
            [ 'name' => 'Guayaba', 'image' => 'img/featured/feature-3.jpg', 'price' => 15000 ],
            [ 'name' => 'Sandía', 'image' => 'img/featured/feature-4.jpg', 'price' => 25000 ],
            [ 'name' => 'Mango', 'image' => 'img/featured/feature-7.jpg', 'price' => 17000 ],
            [ 'name' => 'Manzana', 'image' => 'img/featured/feature-8.jpg', 'price' => 12000 ],
            [ 'name' => 'UVA', 'image' => 'img/featured/feature-5.jpg', 'price' => 30000 ],
        ];
        DB::table('products')->insert($products);
    }
}
