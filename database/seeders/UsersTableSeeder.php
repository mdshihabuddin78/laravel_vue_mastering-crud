<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    public function run(): void
    {
            $users = [
                [
                'name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => Hash::make('123456'),
                ],
                [
                'name' => 'Maine Admin',
                'email' => 'maineadmin@gmail.com',
                'password' => Hash::make('123456'),
                ]
                ];
                User::truncate();
        DB::table('users')->insert($users);
    }
}
