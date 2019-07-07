<?php

use Illuminate\Database\Seeder;

class SalesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sales')->insert([
            'code' => 4566,
            'emission_date' => '2019-01-20',
            'total_amount' => 500.45,
            'order_id' => 1
        ]);

        DB::table('sales')->insert([
            'code' => 1212341,
            'emission_date' => '2019-07-20',
            'total_amount' => 1525.45,
            'order_id' => 2
        ]);
    }
}
