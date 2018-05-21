<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Thura Aung',
            'email' => 'thuraaung2493@gmail.com',
            'password' => bcrypt('wpa28'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $admin = Role::where('slug', 'admin')->get();

        $user->roles()->attach($admin);
    }
}
