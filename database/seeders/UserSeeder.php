<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'=>'Admin',
            'email'=>'admin@admin.com',
            'password'=>'admin',
            'is_admin'=>true,
        ]);

        DB::table('users')->insert([
            'name'=>'User',
            'email'=>'user@user.com',
            'password'=>'user',
            'is_admin'=>false
        ]);
    }
}
