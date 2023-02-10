<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'expire_date'=> null
        ],
        [
            'name' => 'Dr/Assem',
            'email' => 'dr_assem@dr_assem.com',
            'password' => Hash::make('dr_assem2023'),
            'expire_date'=> Carbon::now()->addDays(14)->timezone('Africa/Cairo')
        ],
        
        [
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'expire_date'=>null
        ],[
            'name' => 'Employee',
            'email' => 'employee@employee.com',
            'password' => Hash::make('123456'),
            'expire_date'=>null
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
