<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            ['name' => 'bagus', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'rusak', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'perlu perbaikan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
            ['name' => 'dalam perbaikan', 'created_at' => Carbon::now(), 'updated_at' => Carbon::now()],
        ];

        DB::table('statuses')->insert($statuses);
    }
}
