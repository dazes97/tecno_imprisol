<?php

use Illuminate\Database\Seeder;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ClientsTableSeeder::class);
        $this->call(ProvidersTableSeeder::class);
        $this->call(AdministrativesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeeder::class);
        $this->call(Order__DetailTableSeeeder::class);
        $this->call(SalesTableSeeder::class);
        //factory(User::class, 2)->create();

    }
}
