<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Citizen;

class CitizenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        
        // Buat user terlebih dahulu
        $users = User::factory(20)->create(['role' => 'user']);
        
        foreach($users as $user) {
            Citizen::create([
                'user_id' => $user->id,
                'nik' => $faker->numerify('################'),
                'no_kk' => $faker->numerify('################'),
                'name' => $user->name, // Gunakan nama user
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2005-12-31'),
                'jenis_kelamin' => $faker->randomElement(['L', 'P']),
                'alamat' => $faker->address,
                'rt' => str_pad($faker->numberBetween(1, 99), 3, '0', STR_PAD_LEFT),
                'rw' => str_pad($faker->numberBetween(1, 99), 3, '0', STR_PAD_LEFT),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha']),
                'status_perkawinan' => $faker->randomElement(['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati']),
                'pekerjaan' => $faker->jobTitle,
                'kewarganegaraan' => 'WNI',
                'pendidikan' => $faker->randomElement(['SD', 'SMP', 'SMA', 'D3', 'S1', 'S2', 'S3']),
            ]);
        }
    }
}
