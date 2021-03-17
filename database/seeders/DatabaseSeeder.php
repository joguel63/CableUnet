<?php

namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(ChannelSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(UserSeeder::class);
        \App\Models\Programa::factory(60)->create();
        // \App\Models\User::factory(10)->create();
    }
}
