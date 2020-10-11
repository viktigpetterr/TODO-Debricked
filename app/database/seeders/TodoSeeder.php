<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'created_at' => now(),
                'updated_at' => now(),
                'done' => true,
                'text' => 'Fix debugger',
                'category_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'done' => false,
                'text' => 'Fix seeds',
                'category_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'done' => false,
                'text' => 'Fix vue import',
                'category_id' => 1
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'done' => true,
                'text' => 'Fix bugs',
                'category_id' => 2
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'done' => false,
                'text' => 'Attend meetings',
                'category_id' => 2
            ],
            [
                'created_at' => now(),
                'updated_at' => now(),
                'done' => false,
                'text' => 'Finish master thesis',
                'category_id' => 3
            ]
        ]);
    }
}
