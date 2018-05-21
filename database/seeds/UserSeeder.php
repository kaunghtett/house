<?php

use App\Role;
use App\User;
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
        $guestUser = User::create([
            'name' => 'Aung Aung',
            'email' => 'aung@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $guest = Role::where('slug', 'guest')->get();

        $guestUser->roles()->attach($guest);

        $hostUser = User::create([
            'name' => 'Zaw Zaw',
            'email' => 'zaw@gmail.com',
            'password' => bcrypt('123456'),
        ]);

        $host = Role::where('slug', 'host')->get();

        $hostUser->roles()->attach($host);
    }
}
