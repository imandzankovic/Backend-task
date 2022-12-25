<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tasks')->insert([
            'name'=>'Task1',
            'description'=>'desc Task1',
            'details'=>'details Task1',
            'user_id'=>1,
            'done'=>false
        ]);

        DB::table('tasks')->insert([
            'name'=>'Task2',
            'description'=>'desc Task2',
            'details'=>'details Task2',
            'user_id'=>1,
            'done'=>false
        ]);
    }
}
