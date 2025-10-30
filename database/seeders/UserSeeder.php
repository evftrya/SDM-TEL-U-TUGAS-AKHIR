<?php

namespace Database\Seeders;

use App\Models\riwayatJenjangPendidikan;
use App\Models\RiwayatNip;
use App\Models\SK;
use App\Models\Tpa;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // Create admin user
        $user1 = User::factory()->admin()->create([
            'nama_lengkap' => 'Admin Telkom University',
            'email_institusi' => 'admin@telkomuniversity.ac.id',
        ]);



        // Create test user accounts
        $user2 = User::factory()->create([
            'nama_lengkap' => 'Budi Santoso',
            'email_institusi' => 'budi.santoso@telkomuniversity.ac.id',
        ]);

        $user3 = User::factory()->create([
            'nama_lengkap' => 'Siti Nurhaliza',
            'email_institusi' => 'siti.nurhaliza@telkomuniversity.ac.id',
        ]);

        $refJenjangPendidikan = \App\Models\RefJenjangPendidikan::all();
        $refPangkatGolongan = \App\Models\RefPangkatGolongan::all();
        $refStatusPegawai = \App\Models\RefStatusPegawai::all();

        $users = User::all();
        // dd($users);
        foreach ($users as $user) {
            // dd($user->id);


            $indexRefStatusPegawai = fake()->numberBetween(0, count($refStatusPegawai)-1);
            // dd($refStatusPegawai[$indexRefStatusPegawai]);


            RiwayatNip::factory()->create([
                'users_id' => $user->id,
                'nip' => fake()->unique()->numerify('##############'),
                'status_pegawai_id' => $refStatusPegawai[$indexRefStatusPegawai]['id'],
                // 'status_pegawai_id' => (string) data_get($refStatusPegawai[$indexRefStatusPegawai], 'id'),

            ]);

            riwayatJenjangPendidikan::factory()->create([
                'users_id' => $user->id,
                'jenjang_pendidikan_id' => $refJenjangPendidikan[fake()->numberBetween(0, count($refJenjangPendidikan)-1)]->id,
            ]);

            if($refStatusPegawai[$indexRefStatusPegawai]->tipe_pegawai === 'Dosen'){
                $indexRefPangkatGolongan = fake()->numberBetween(0, count($refPangkatGolongan)-1);
                $dosen = \App\Models\Dosen::factory()->create([
                    'users_id' => $user->id,
                ]);

                $skLLKDIKTI = SK::factory()->create([
                    'users_id' => $user->id,
                    'tipe_sk' => 'LLDIKTI',
                ]);

                // dd($refPangkatGolongan[$indexRefPangkatGolongan]->id);
                \App\Models\riwayatPangkatGolongan::factory()->create([
                    'dosen_id' => $dosen->id,
                    'pangkat_golongan_id' => $refPangkatGolongan[$indexRefPangkatGolongan]->id,
                    'sk_llkdikti_id' => $skLLKDIKTI->id,
                    'sk_pengakuan_ypt_id' => null,

                ]);

            }
            else{
                Tpa::factory()->create([
                'users_id' => $user->id,
                'nitk' => fake()->unique()->numerify('#############'),
            ]);
            }
        }
    }
}
