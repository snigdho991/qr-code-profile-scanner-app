<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name'     => 'Abhirajg Gulati',
    		'email'    => 'admin@gmail.com',
    		'password' => bcrypt('password'),
            'role'     => 'Administrator',
    	]); 

        $user->assignRole('Administrator');
    }
}
