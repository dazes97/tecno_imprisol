<?php

use Illuminate\Database\Seeder;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('categories')->insert([
            'description' => "impresora"
        ]);
        DB::table('categories')->insert([
            'description' => "cartuchos"
        ]);
        DB::table('categories')->insert([
            'description' => "accesorios"
        ]);
        DB::table('categories')->insert([
            'description' => "portatiles"
        ]);
    }
}
