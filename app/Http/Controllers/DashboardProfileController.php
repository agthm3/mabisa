<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name'            => ['required', 'string', 'max:255'],
            'nip'              => ['nullable', 'string', 'max:50'],
            'nik'              => ['nullable', 'string', 'max:50'],
            'unit_kerja'      => ['nullable', 'string', 'max:255'],
            'jabatan'         => ['nullable', 'string', 'max:255'],
            'rt'              => ['nullable', 'string', 'max:5'],
            'rw'              => ['nullable', 'string', 'max:5'],
            'kelurahan'       => ['nullable', 'string', 'max:255'],
            'kecamatan'       => ['nullable', 'string', 'max:255'],
            'alamat_kantor'   => ['nullable', 'string', 'max:255'],
            'nomor_hp'        => ['nullable', 'string', 'max:30'],

            'foto_profil'       => ['nullable', 'image', 'max:2048'], // 2MB
            'foto_rumah_kantor' => ['nullable', 'image', 'max:4096'], // 4MB
        ]);

        // handle upload foto profil
        if ($request->hasFile('foto_profil')) {
            // hapus lama (optional)
            if ($user->foto_profil && Storage::disk('public')->exists($user->foto_profil)) {
                Storage::disk('public')->delete($user->foto_profil);
            }

            $path = $request->file('foto_profil')->store('foto_profil', 'public');
            $validated['foto_profil'] = $path;
        }

        // handle upload foto rumah/kantor
        if ($request->hasFile('foto_rumah_kantor')) {
            if ($user->foto_rumah_kantor && Storage::disk('public')->exists($user->foto_rumah_kantor)) {
                Storage::disk('public')->delete($user->foto_rumah_kantor);
            }

            $path = $request->file('foto_rumah_kantor')->store('foto_rumah_kantor', 'public');
            $validated['foto_rumah_kantor'] = $path;
        }

        $user->update($validated);

        return redirect()
            ->route('dashboard.profile.index')
            ->with('success', 'Profil berhasil diperbarui.');
    }
}
