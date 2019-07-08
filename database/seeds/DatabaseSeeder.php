<?php

use Illuminate\Database\Seeder;
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
        $this->call(WareHousesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);
        $this->call(Order__DetailTableSeeeder::class);
        $this->call(SalesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(Case__UsesTableSeeder::class);
        $this->call(PrivilegesTableSeeder::class);
        //factory(User::class, 2)->create();

    }
}
