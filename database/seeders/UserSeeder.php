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
            [
                'name'     => 'Admin',
                'email'    => 'admin@example.com',
                'password' => bcrypt('secret'),
                'mobile'   => '01823566544'
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'password' => bcrypt('secret'),
                'mobile'   => '01723566544'
            ],
        ]);
    }
}
