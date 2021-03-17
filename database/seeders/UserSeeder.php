<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'Miguel Muñoz',
            'email'=>'joguel63@gmail.com',
            'password'=>bcrypt('12345678')
        ])->assignRole('admin');

        User::factory(99)->create();
    }
}
