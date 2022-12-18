<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
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
            'name' => 'gary',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('1234567'),
            'status' => 'is_admin',
            'phone' => '012345678'
        ]);
        //
    }
}
