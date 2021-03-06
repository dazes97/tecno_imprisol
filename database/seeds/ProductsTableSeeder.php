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
        DB::table('warehouses')->insert([
            'codigo' => "cod001",
            'nombre' => "almacen1",
        ]);
        DB::table('warehouses')->insert([
            'codigo' => "cod002",
            'nombre' => "almacen2",
        ]);
    
        DB::table('products')->insert([
            'code' => "1121",
            'name' => "impresora",
            'brand' => "Epson",
            'model' => "456px",
            'purchase_price' => 45.20,
            'sale_cost' => 50,
            'category_id' => 1,
            'warehouse_id' => 1
        ]);
        DB::table('products')->insert([
            'code' => "1231",
            'name' => "tinta",
            'brand' => "Epson",
            'model' => "Cartucho de tinta",
            'purchase_price' => 20.3,
            'sale_cost' => 25.5,
            'category_id' => 2,
            'warehouse_id' => 1
        ]);
    }
}
