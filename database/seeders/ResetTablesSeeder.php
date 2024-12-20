<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
class ResetTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('money_management')->truncate();
        DB::table('quick_positions')->truncate();
        DB::table('trades')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
