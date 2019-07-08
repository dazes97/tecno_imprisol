<?php

use Illuminate\Database\Seeder;

class Count_PagetableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('count_pages')->insert([
            'case_use' => "CU1 Gestionar Usuario",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU2 Gestionar Producto",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU3 Gestionar Ventas",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU4 Gestionar Inventarios",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU5 Gestionar Entregas",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU6 Gestionar Pedidos",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU7 Reportes",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU8 Estadisticas",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU9 Gestionar Compra Producto",
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "Pagina De Informacion",
        ]);


    }
}
