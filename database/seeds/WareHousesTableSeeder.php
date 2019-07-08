<?php

use Illuminate\Database\Seeder;

class WareHousesTableSeeder extends Seeder
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
    }
}
