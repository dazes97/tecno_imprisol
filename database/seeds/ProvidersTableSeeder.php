<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('providers')->insert([
            'id' => 3,
            'code' => '20194',
            'name' => 'IMPRIMAYOR S.A.',
            'phone' => '72150495',
            'address' => 'Av. Cumavi N°16'
        ]);
    }
}
