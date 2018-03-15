<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(BasketsTableSeeder::class);
        //$this->call(AreasTableSeeder::class);
        $this->call(SubAreasTableSeeder::class);
        $this->call(CommunicationsTableSeeder::class);
        $this->call(MediaTableSeeder::class);
        $this->call(AsksTableSeeder::class);
        $this->call(AudiencesTableSeeder::class);
    }
}
