<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
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
            'name' => 'SuperAdmin',
            'email' => 'superadmin@superadmin.com',
            'password' => Hash::make('123456'),
        ],[
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ],[
            'name' => 'Employee',
            'email' => 'employee@employee.com',
            'password' => Hash::make('123456'),
        ]
    ]);

        DB::table('role_user')->insert([
          [  'role_id' => '1',
            'user_id' => '1',
            'user_type' => 'App\Models\User',
        ],
        [
            'role_id' => '2',
            'user_id' => '2',
            'user_type' => 'App\Models\User',
        ],
        [
            'role_id' => '3',
            'user_id' => '3',
            'user_type' => 'App\Models\User',
        ]]);

    }
}
