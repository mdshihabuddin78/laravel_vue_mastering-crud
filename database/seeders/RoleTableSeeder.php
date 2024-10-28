<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Role::truncate();
        $role = new \App\Models\Role();
        $role->name = 'Admin';
        $role->save();
    }

}

