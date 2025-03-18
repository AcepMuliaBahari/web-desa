<?php
namespace Database\Seeders;
use App\Models\Letter;
use App\Models\User;
use App\Models\Citizen;
use Illuminate\Database\Seeder;

class LetterSeeder extends Seeder
{
    public function run(): void
    {
        $admin = User::where('email', 'admin@gmail.com')->first();
        $citizens = Citizen::all();
        
        if ($citizens->isEmpty()) {
            $this->command->info('Tidak ada data citizen. Silakan jalankan CitizenSeeder terlebih dahulu.');
            return;
        }

        $letterTypes = ['surat_keterangan', 'surat_pengantar', 'surat_rekomendasi'];
        $statuses = ['pending', 'approved', 'rejected'];

        // Buat 20 surat contoh
        for ($i = 1; $i <= 20; $i++) {
            $status = $statuses[array_rand($statuses)];
            $approvedAt = null;
            $approvedBy = null;
            $rejectionReason = null;

            if ($status === 'approved') {
                $approvedAt = now();
                $approvedBy = $admin->id;
            } elseif ($status === 'rejected') {
                $rejectionReason = 'Dokumen persyaratan kurang lengkap';
            }

            Letter::create([
                'citizen_id' => $citizens->random()->id,
                'letter_type' => $letterTypes[array_rand($letterTypes)],
                'reference_number' => 'SURAT/' . date('Y') . '/' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'purpose' => 'Keperluan ' . fake()->sentence(),
                'lampiran' => rand(0, 3) . ' Lembar',
                'description' => fake()->paragraph(),
                'status' => $status,
                'rejection_reason' => $rejectionReason,
                'approved_at' => $approvedAt,
                'approved_by' => $approvedBy,
                'created_at' => fake()->dateTimeBetween('-3 months', 'now'),
                'updated_at' => now(),
            ]);
        }
    }
}

