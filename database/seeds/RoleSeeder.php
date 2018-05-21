<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'show-house' => true,
                'create-house' => true,
                'update-house' => true,
                'delete-house' => true,
                'approve-house' => true,
                'block-house' => true,
                'create-role' => true,
                'delete-user' => true,
            ],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $host = Role::create([
            'name' => 'Host',
            'slug' => 'host',
            'permissions' => [
                'create-house' => true,
                'update-house' => true,
                'delete-house' => true,
            ],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $guest = Role::create([
            'name' => 'Guest',
            'slug' => 'guest',
            'permissions' => [
                'show-house' => true,
            ],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
