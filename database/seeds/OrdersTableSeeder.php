<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
            'code' => "565adsd",
            'date' => '2019-07-20',
            'description' => 'mi primera orden',
            'total_amount' => 500.45,
        ]);
        DB::table('orders')->insert([
            'code' => "456465assss",
            'date' => '2019-07-10',
            'description' => 'mi segunda orden',
            'total_amount' => 1525.45,
        ]);
    }
}
