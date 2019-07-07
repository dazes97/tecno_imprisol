<?php

use Illuminate\Database\Seeder;

class Order__DetailTableSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order__details')->insert([
            'description' => "nose que pedo",
            'quantity' => 5,
            'subtotal' => 500.45,
            'order_id' => 1,
            'product_id' => 1
        ]);
        DB::table('order__details')->insert([
            'description' => "nose que pedo",
            'quantity' => 5,
            'subtotal' => 1525.45,
            'order_id' => 2,
            'product_id' => 2
        ]);
    }
}
