<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => "administrativo",
            "description" => "describiendo rol de administrativo"
        ]);
        DB::table('roles')->insert([
            'name' => "cliente",
            "description" => "describiendo rol de Cliente"
        ]);
        DB::table('roles')->insert([
            'name' => "root",
            "description" => "describiendo rol de Root"
        ]);
    }
}
