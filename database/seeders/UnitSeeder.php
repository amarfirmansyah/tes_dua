<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [
            [
                'name' => 'kg/ha',
                'description' => 'Berat per hektar',
                'type' => 'UNITS',
            ],
            [
                'name' => 'kg/100L',
                'description' => 'Berat per 100 liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'L/ha',
                'description' => 'Volume per hektar',
                'type' => 'UNITS',
            ],
            [
                'name' => 'N.A',
                'description' => 'Tidak berlaku',
                'type' => 'UNITS',
            ],
            [
                'name' => 'L/100L',
                'description' => 'Volume per 100 liter',
                'type' => 'LUNITS',
            ],
            [
                'name' => 'mL/ha',
                'description' => 'Volume per hektar',
                'type' => 'UNITS',
            ],
            [
                'name' => 'mL/100L',
                'description' => 'Volume per 100 liter',
                'type' => 'LUNITS',
            ],
            [
                'name' => 'g/20m2',
                'description' => 'Berat per 20 meter persegi',
                'type' => 'UNITS',
            ],
            [
                'name' => 'L/20m2',
                'description' => 'Volume per 20 meter persegi',
                'type' => 'UNITS',
            ],
            [
                'name' => 'mL/10L',
                'description' => 'Volume per 10 liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'L/10L',
                'description' => 'Volume per 10 liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'mL/L',
                'description' => 'Volume per liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'g/L',
                'description' => 'Berat per liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'L/L',
                'description' => 'Volume per liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'g/100L',
                'description' => 'Berat per 100 liter',
                'type' => 'UNITS',
            ],
            [
                'name' => 'kg/100m2',
                'description' => 'Berat per 100 meter persegi',
                'type' => 'UNITS',
            ],
            [
                'name' => 'g/ha',
                'description' => 'Berat per hektar',
                'type' => 'UNITS',
            ],
            [
                'name' => 'mL/m2',
                'description' => 'Volume per meter persegi',
                'type' => 'UNITS',
            ],
            [
                'name' => 'kg/L',
                'description' => 'WeighPerVolume',
                'type' => "UNITS",
            ],
            [
                'name' => 'g/m2',
                'description' => 'WeighPerArea',
                'type' => 'UNITS',
            ],
            [
                'name' => 'g',
                'description' => 'Weight',
                'type' => 'UNIT_SIGNLE',
            ],
            [
                'name' => 'kg',
                'description' => 'Weight',
                'type' => 'UNIT_SIGNLE',
            ],
            [
                'name' => 'mL',
                'description' => 'Weight',
                'type' => 'UNIT_SIGNLE',
            ],
            [
                'name' => 'L',
                'description' => 'Weight',
                'type' => 'UNIT_SIGNLE',
            ],

        ];

        DB::table('unit')->insert($units);
    }
}
