<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use CreateUsersTable;
use Illuminate\Database\Seeder;
use Database\Seeders\OrganizationSeeder;
use Database\Seeders\GallerySeeder;
use Database\Seeders\UmkmSeeder;
use Database\Seeders\DevelopmentSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CitizenSeeder::class,
            UserTableSeeder::class,
            EventSeeder::class,
          
            VillageRegulationSeeder::class,
            NewsSeeder::class,
            ComplaintSeeder::class,
            LetterSeeder::class,
            FinanceSeeder::class,
            OrganizationSeeder::class,
            GallerySeeder::class,
            UmkmSeeder::class,
            DevelopmentSeeder::class,
        ]);

        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
