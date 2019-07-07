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
    }
}
