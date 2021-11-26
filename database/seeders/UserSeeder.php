<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@moulinette.com',
            'password' => bcrypt('admin'),
            'role' => 'admin'
        ]);

        DB::table('users')->insert([
            'name' => 'gestionnaire',
            'email' => 'gest@moulinette.com',
            'password' => bcrypt('gestionnaire'),
            'role' => 'gestionnaire'
        ]);

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@moulinette.com',
            'password' => bcrypt('user'),
            'role' => 'utilisateur'
        ]);
    }
}
