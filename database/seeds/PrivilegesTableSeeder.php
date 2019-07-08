<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //administrativo
        DB::table('case__uses')->insert([
            'case_use_id' => 1,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 2,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 3,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 4,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 5,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 7,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 8,
            'role_id' => 1
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 9,
            'role_id' => 1
        ]);

        //cliente
        DB::table('case__uses')->insert([
            'case_use_id' => 1,
            'role_id' => 3
        ]);

        //root
        DB::table('case__uses')->insert([
            'case_use_id' => 1,
            'role_id' => 3
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 2,
            'role_id' => 3
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 3,
            'role_id' => 3
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 4,
            'role_id' => 3
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 7,
            'role_id' => 3
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 8,
            'role_id' => 3
        ]);
        DB::table('case__uses')->insert([
            'case_use_id' => 9,
            'role_id' => 3
        ]);
    }
}
