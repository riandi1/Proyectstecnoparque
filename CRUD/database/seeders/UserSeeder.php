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
            'name' => 'Andres Mauricio Rendon Diaz',
            'email' => 'rendondiaza@gmail.com',
            'password' => bcrypt('popolico')
        ])->assignRole('Admin');

        User::factory(9)->create();
    }
}
