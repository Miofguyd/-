<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DateTime;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
             'id' => 1,
             'name' => '山田太郎',
             'email' => 'anime@icloud.com',
             'email_verified_at' => null,
             'password' => Hash::make('anime555'),
             'nickname' => 'Taro',
             'created_at' => new Datetime(),
             'updated_at' => new Datetime(),
             ]);
    }
}
