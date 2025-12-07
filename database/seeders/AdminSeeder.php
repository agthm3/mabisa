<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator MABISA',
            'email' => 'adminmabisa@gmail.com',
            'password' => Hash::make('adminmabisa962'),

            // dummy profile data
            'nip' => '19791231'.rand(1000,9999),
            'nik' => '7306'.rand(1000000000, 9999999999),
            'unit_kerja' => 'BRIDA Kota Makassar',
            'jabatan' => 'Admin Kota',
            'rt' => rand(1, 10),
            'rw' => rand(1, 5),
            'kelurahan' => 'Dummy Kelurahan',
            'kecamatan' => 'Dummy Kecamatan',
            'alamat_kantor' => 'Jl. Dummy No. '.rand(1,200),
            'nomor_hp' => '08'.rand(1000000000, 9999999999),

            // foto null dahulu
            'foto_profil' => null,
            'foto_rumah_kantor' => null,

            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ]);
    }
}
