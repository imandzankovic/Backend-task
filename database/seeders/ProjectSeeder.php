<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([
            'name'=>'Project 1',
            'description'=>'desc Project1',
            'task_id'=>1
        ]);

        DB::table('projects')->insert([
            'name'=>'Project 2',
            'description'=>'desc Project 2',
            'task_id'=>1
        ]);
    }
}
