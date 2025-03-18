<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('organizations')->insert([
            [
                'name' => 'Pemerintah Desa',
                'role' => 'Ketua',
                'photo' => null,
                'description' => 'pemerintah desa untuk meningkatkan kegiatan sosial dan ekonomi.',
                'contact_phone' => '081234567890',
                'contact_email' => 'karangtaruna@desa.id',
                'order' => 1,
                'is_active' => true,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'RT',
                'role' => 'RT 1',
                'photo' => null,
                'description' => 'membantu pemerintah desa dalam meningkatkan kegiatan sosial dan ekonomi.',
                'contact_phone' => '081234567890',
                'contact_email' => 'karangtaruna@desa.id',
                'order' => 2,
                'is_active' => true,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Karang Taruna Desa',
                'role' => 'Ketua',
                'photo' => null,
                'description' => 'Organisasi pemuda desa untuk meningkatkan kegiatan sosial dan ekonomi.',
                'contact_phone' => '081234567890',
                'contact_email' => 'karangtaruna@desa.id',
                'order' => 3,
                'is_active' => true,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PKK Desa',
                'role' => 'Ketua',
                'photo' => null,
                'description' => 'Pemberdayaan dan Kesejahteraan Keluarga',
                'contact_phone' => '081234567891',
                'contact_email' => 'pkk@desa.id',
                'order' => 4,
                'is_active' => true,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'BPD',
                'role' => 'Ketua',
                'photo' => null,
                'description' => 'Badan Permusyawaratan Desa',
                'contact_phone' => '081234567892',
                'contact_email' => 'bpd@desa.id',
                'order' => 5,
                'is_active' => true,
                'parent_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
