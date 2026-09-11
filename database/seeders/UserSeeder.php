<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outlet = \App\Models\Outlet::where('name', 'Pawon Hepi')->first();

        \App\Models\User::create([
            'name' => 'Superadmin Pawon Hepi',
            'email' => 'superadmin@pawonhepi.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'super_admin',
            'outlet_id' => $outlet ? $outlet->id : null,
        ]);

        \App\Models\User::create([
            'name' => 'Kasir Pawon Hepi',
            'email' => 'pos.senior@pawonhepi.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'staff_pos_senior',
            'outlet_id' => $outlet ? $outlet->id : null,
        ]);
    }
}
