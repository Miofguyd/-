<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
           UsersSeeder::class,
           SledSeeder::class,
           CastSeeder::class,
           TagSeeder::class,
           SubscriptionSeeder::class,
           ReviewSeeder::class,
           AnimeSeeder::class,
           AnimeCastSeeder::class,
           AnimeTagSeeder::class,
           AnimeSubscriptionSeeder::class,
           AnimeapisSeeder::class,
           ]);
    }
}
