<?php

use Illuminate\Database\Seeder;

class ClientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            'id' => 2,
            'name' => 'Alex Dominguez',
            'phone' => '72150495'
        ]);

        //count pages
        DB::table('count_pages')->insert([
            'case_use' => "CU1 Gestionar Usuario",
            'color' => 'red'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU2 Gestionar Producto",
            'color' => 'blue'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU3 Gestionar Ventas",
            'color' => 'blue'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU4 Gestionar Inventarios",
            'color' => 'orange'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU5 Gestionar Entregas",
            'color' => 'green'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU6 Gestionar Pedidos",
            'color' => 'yellow'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU7 Reportes",
            'color' => 'violet'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU8 Estadisticas",
            'color' => 'gray'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "CU9 Gestionar Compra Producto",
            'color' => 'brown'
        ]);
        DB::table('count_pages')->insert([
            'case_use' => "Pagina De Informacion",
            'color' => 'black'
        ]);
    }
}
