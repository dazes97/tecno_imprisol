<?php

use Illuminate\Database\Seeder;

class AdministrativesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('administratives')->insert([
            'id' => 1,
            'name' => 'Daniel Zeballos',
            'phone' => '78066791',
            'date_admission' => '2019-01-13'
        ]);
    }
}
