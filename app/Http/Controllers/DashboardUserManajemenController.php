<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class DashboardUserManajemenController extends Controller
{
    public function index()
    {
        // Ambil semua user + relasi roles
        $users = User::with('roles')->orderBy('name')->get();

        // Summary box
        $totalUser       = $users->count();
        $rtRwCount       = $users->filter(fn ($u) => $u->hasRole('RT/RW'))->count();
        $verifikatorCount = $users->filter(fn ($u) =>
            $u->hasAnyRole(['Lurah', 'Camat', 'Verifikator OPD'])
        )->count();
        $lockedCount     = 0; // nanti kalau sudah ada kolom status_akun bisa dihitung beneran

        return view('dashboard.user.index', compact(
            'users',
            'totalUser',
            'rtRwCount',
            'verifikatorCount',
            'lockedCount'
        ));
    }

    public function updateRole(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => ['required', 'string', 'max:50'],
        ]);

        $roleName = $validated['role'];

        // Pastikan role ada di tabel roles (Spatie)
        Role::firstOrCreate(['name' => $roleName]);

        // Sync role utama (kalau mau multi-role nanti bisa disesuaikan)
        $user->syncRoles([$roleName]);

        return back()->with('success', "Peran untuk {$user->name} berhasil diperbarui menjadi {$roleName}.");
    }
}
