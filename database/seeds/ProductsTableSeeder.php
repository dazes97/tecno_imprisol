<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'code' => "1121",
            'brand' => "Epson",
            'model' => "456px",
            'purchase_price' => "45,20",
            'sale_cost' => "50",
            'category_id' => 1,
        ]);
        DB::table('products')->insert([
            'code' => "1231",
            'brand' => "Epson",
            'model' => "Cartucho de tinta",
            'purchase_price' => "20",
            'sale_cost' => "25",
            'category_id' => 2,
        ]);
    }
}
