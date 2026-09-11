<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $outlet = \App\Models\Outlet::create([
            'name' => 'Pawon Hepi',
            'address' => 'Jl. Kaliurang KM 14 Gg Banteng Tegalsari Umbulmartani, Sleman, Yogyakarta',
        ]);

        \App\Models\OutletSetting::create([
            'outlet_id' => $outlet->id,
        ]);
    }
}
