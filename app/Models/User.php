<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles; // <— pakai Spatie

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',

        // profil MABISA
        'nip',
        'nik',
        'unit_kerja',
        'jabatan',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'alamat_kantor',
        'nomor_hp',
        'foto_profil',
        'foto_rumah_kantor',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
