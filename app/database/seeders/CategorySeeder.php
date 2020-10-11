<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Dev',
                'user_id' => 1,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Debricked',
                'user_id' => 1,
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'name' => 'Studies',
                'user_id' => 1,
            ]
        ]);
    }
}
