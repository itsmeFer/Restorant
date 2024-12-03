<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Table;

class TableSeeder extends Seeder
{
    public function run()
    {
        Table::insert([
            ['table_number' => 'T1', 'capacity' => 4, 'status' => 'available'],
            ['table_number' => 'T2', 'capacity' => 2, 'status' => 'available'],
            ['table_number' => 'T3', 'capacity' => 6, 'status' => 'occupied'],
            ['table_number' => 'T4', 'capacity' => 4, 'status' => 'available'],
        ]);
    }
}
