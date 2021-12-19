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
            'name' => 'Administrador',
            'surname' => 'autosleo',
            'date_of_birth' => '2021-07-12 17:23:03',
            'municipalityid' => '1',
            'address' => 'el carmen de viboral',
            'telephone' => '124124',
            'cellphone' => '21412',
            'gender' => '1',
            'email' => 'rendondiaza9444@gmail.com',
            'password'=> bcrypt('a1b2c3')
        ])->assignRole('Admin');
    }
}
