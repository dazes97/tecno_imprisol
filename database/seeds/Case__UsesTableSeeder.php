<?php

use Illuminate\Database\Seeder;

class Case__UsesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('case__uses')->insert([
            'name' => "CU1",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU2",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU3",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU4",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU5",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU6",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU7",
        ]);
        DB::table('case__uses')->insert([
            'name' => "CU8",
        ]);
    }
}
