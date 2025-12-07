@extends('layouts.dashboard')

@section('content')
        <!-- CONTENT -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan -->
        <section class="grid gap-4 md:grid-cols-4">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Total user
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $totalUser }}</p>
            <p class="mt-1 text-[11px] text-slate-500">Semua peran di MABISA.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW terdaftar
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">{{ $rtRwCount }}</p>
            <p class="mt-1 text-[11px] text-slate-500">Memiliki akses upload bukti.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Verifikator aktif
            </p>
            <p class="mt-2 text-2xl font-semibold text-emerald-600">{{ $verifikatorCount }}</p>
            <p class="mt-1 text-[11px] text-slate-500">Lurah, Camat, dan OPD teknis.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Akun terkunci
            </p>
            <p class="mt-2 text-2xl font-semibold text-rose-600">{{ $lockedCount }}</p>
            <p class="mt-1 text-[11px] text-slate-500">Butuh reset oleh admin.</p>
          </div>
        </section>

        <!-- Filter & tabel user -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="mb-4 flex flex-wrap items-center justify-between gap-3">
            <!-- Search -->
            <div class="flex flex-1 items-center gap-2 max-w-md">
              <div class="relative flex-1">
                <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-xs">🔍</span>
                <input
                  id="searchUser"
                  type="text"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 pl-7 pr-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Cari nama, email, atau unit kerja..."
                />
              </div>
            </div>
            <!-- Filters -->
            <div class="flex flex-wrap items-center gap-2 text-[11px]">
              <select
                id="filterRole"
                class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
              >
                <option value="">Semua peran</option>
                <option>RT/RW</option>
                <option>Lurah</option>
                <option>Camat</option>
                <option>Verifikator</option>
                <option>Admin Kota</option>
                <option>Super Admin</option>
              </select>
              <select
                id="filterStatus"
                class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
              >
                <option value="">Semua status</option>
                <option>Aktif</option>
                <option>Non-aktif</option>
                <option>Terkunci</option>
              </select>
            </div>
          </div>

          <!-- Tabel -->
          <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full border-collapse text-xs">
              <thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">
                <tr>
                  <th class="px-3 py-2 text-left">User</th>
                  <th class="px-3 py-2 text-left">Peran utama</th>
                  <th class="px-3 py-2 text-left">Unit / Wilayah</th>
                  <th class="px-3 py-2 text-left">Status</th>
                  <th class="px-3 py-2 text-left">Login terakhir</th>
                  <th class="px-3 py-2 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="userTableBody" class="divide-y divide-slate-100">
                @foreach($users as $user)
                  @php
                      $mainRole = $user->roles->pluck('name')->first();
                  @endphp
                  <tr
                    class="hover:bg-slate-50/80"
                    data-name="{{ $user->name }}"
                    data-email="{{ $user->email }}"
                    data-role="{{ $mainRole }}"
                    data-status="Aktif"
                    data-update-url="{{ route('dashboard.user.updateRole', $user) }}"
                  >
                    <td class="px-3 py-2 align-top">
                      <p class="font-semibold text-slate-900">{{ $user->name }}</p>
                      <p class="text-[11px] text-slate-500">{{ $user->email }}</p>
                    </td>

                    <td class="px-3 py-2 align-top">
                      @if($mainRole)
                        <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[11px] font-medium text-mabisa-700">
                          {{ $mainRole }}
                        </span>
                      @else
                        <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-500">
                          Belum ada peran
                        </span>
                      @endif

                      <p class="mt-0.5 text-[11px] text-slate-500">
                        {{-- deskripsi singkat (opsional) --}}
                      </p>
                    </td>

                    <td class="px-3 py-2 align-top">
                      @if($user->unit_kerja)
                        <p class="text-[11px] text-slate-700">{{ $user->unit_kerja }}</p>
                      @else
                        <p class="text-[11px] text-slate-500">-</p>
                      @endif

                      @if($user->rt || $user->rw || $user->kelurahan || $user->kecamatan)
                        <p class="text-[11px] text-slate-500">
                          @if($user->rt || $user->rw)
                            RT {{ $user->rt ?? '-' }} / RW {{ $user->rw ?? '-' }}
                          @endif
                          @if($user->kelurahan)
                            • Kel. {{ $user->kelurahan }}
                          @endif
                          @if($user->kecamatan)
                            • Kec. {{ $user->kecamatan }}
                          @endif
                        </p>
                      @endif
                    </td>

                    <td class="px-3 py-2 align-top">
                      <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                        Aktif
                      </span>
                    </td>

                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">
                        {{-- nanti bisa diganti login terakhir dari log --}}
                        -
                      </p>
                      <p class="text-[11px] text-slate-500">-</p>
                    </td>

                    <td class="px-3 py-2 text-center align-top">
                      <button
                        class="btn-role rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      >
                        Atur hak akses
                      </button>
                    </td>
                  </tr>
                @endforeach
              </tbody>

            </table>
          </div>

          <p class="mt-3 text-[11px] text-slate-500">
            Gunakan tombol <strong>“Atur hak akses”</strong> untuk mengubah peran, status, dan hak verifikasi user tertentu.
          </p>
        </section>

        <!-- Info kecil teknis -->
        <section class="mt-2 rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-[11px] text-slate-600">
          <p class="font-semibold mb-1 text-slate-900">Catatan implementasi (untuk tim teknis)</p>
          <ul class="list-disc space-y-1 pl-4">
            <li>Minimal butuh tabel <code>users</code>, <code>roles</code>, dan tabel pivot <code>role_user</code> jika multi-role.</li>
            <li>Status akun (aktif, non-aktif, terkunci) sebaiknya disimpan di kolom terpisah, misalnya <code>status_akun</code>.</li>
            <li>Log perubahan role/status user penting untuk audit (siapa mengubah apa, kapan).</li>
          </ul>
        </section>
      </main>

        <!-- MODAL ATUR HAK AKSES -->
      <div
        id="roleModalOverlay"
        class="fixed inset-0 z-40 hidden items-center justify-center bg-slate-900/40 px-4"
      >
        <div
          class="w-full max-w-lg rounded-3xl border border-slate-200 bg-white p-4 shadow-soft"
          role="dialog"
          aria-modal="true"
        >
          <form id="roleForm" method="POST">
            @csrf

            <div class="mb-3 flex items-start justify-between gap-2">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Pengaturan hak akses
                </p>
                <h2 class="text-sm font-semibold text-slate-900">
                  <span id="modalUserName">Nama User</span>
                </h2>
                <p id="modalUserEmail" class="text-[11px] text-slate-500">
                  email@makassarkota.go.id
                </p>
              </div>
              <button
                type="button"
                id="roleModalClose"
                class="rounded-lg border border-slate-200 bg-slate-50 px-2 py-1 text-[11px] text-slate-600 hover:bg-slate-100"
              >
                ✕
              </button>
            </div>

            <div class="grid gap-3 text-xs md:grid-cols-2">
              <!-- Peran utama -->
              <div class="space-y-2">
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Peran utama
                </p>
                <select
                  id="modalRoleMain"
                  name="role"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                >
                  <option value="RT/RW">RT/RW</option>
                  <option value="Lurah">Lurah</option>
                  <option value="Camat">Camat</option>
                  <option value="Verifikator OPD">Verifikator OPD</option>
                  <option value="Admin Kota">Admin Kota</option>
                  <option value="Super Admin">Super Admin</option>
                </select>

                {{-- status akun masih dummy, nanti bisa dihubungkan ke kolom di DB --}}
                <div class="space-y-1 mt-2">
                  <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                    Status akun
                  </p>
                  <div class="grid gap-2">
                    <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
                      <input type="radio" name="modalStatus" value="Aktif" checked />
                      <span class="text-[11px] text-slate-700">Aktif</span>
                    </label>
                    <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
                      <input type="radio" name="modalStatus" value="Non-aktif" />
                      <span class="text-[11px] text-slate-700">Non-aktif</span>
                    </label>
                    <label class="flex items-center gap-2 rounded-xl border border-rose-100 bg-rose-50 px-2.5 py-1.5">
                      <input type="radio" name="modalStatus" value="Terkunci" />
                      <span class="text-[11px] text-rose-700">Terkunci (butuh reset)</span>
                    </label>
                  </div>
                </div>
              </div>

              <!-- Kolom kanan tetap sama (hak verifikasi & scope) -->
              {{-- ... boleh biarkan dulu hanya kosmetik / belum diproses di backend --}}
            </div>

            <!-- Tombol modal -->
            <div class="mt-4 flex flex-wrap items-center justify-between gap-2 text-[11px]">
              <div class="space-y-1 text-slate-500">
                <p>Perubahan ini akan tercatat di log aktivitas admin.</p>
                <p>Pastikan peran dan status sesuai dengan SK penugasan yang berlaku.</p>
              </div>
              <div class="flex flex-wrap gap-2">
                <button
                  type="submit"
                  id="btnModalSave"
                  class="rounded-xl bg-mabisa-500 px-3.5 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
                >
                  💾 Simpan perubahan
                </button>
                <button
                  type="button"
                  id="btnModalCancel"
                  class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-[11px] text-slate-600 hover:bg-slate-50"
                >
                  Batalkan
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>

@endsection

@push('script')
<script>
  const roleModalOverlay = document.getElementById('roleModalOverlay');
  const roleModalClose   = document.getElementById('roleModalClose');
  const btnModalCancel   = document.getElementById('btnModalCancel');
  const modalUserName    = document.getElementById('modalUserName');
  const modalUserEmail   = document.getElementById('modalUserEmail');
  const modalRoleMain    = document.getElementById('modalRoleMain');
  const roleForm         = document.getElementById('roleForm');

  // Buka modal + set data
  document.querySelectorAll('.btn-role').forEach(btn => {
    btn.addEventListener('click', () => {
      const row       = btn.closest('tr');
      const name      = row.getAttribute('data-name');
      const email     = row.getAttribute('data-email');
      const role      = row.getAttribute('data-role');
      const updateUrl = row.getAttribute('data-update-url');
      const status    = row.getAttribute('data-status');

      modalUserName.textContent = name || 'Nama User';
      modalUserEmail.textContent = email || '';

      // set action form ke route updateRole
      roleForm.action = updateUrl;

      // pilih peran utama di select
      if (role) {
        Array.from(modalRoleMain.options).forEach(opt => {
          opt.selected = (opt.value === role);
        });
      } else {
        modalRoleMain.selectedIndex = 0;
      }

      // status akun (masih kosmetik)
      document.querySelectorAll('input[name="modalStatus"]').forEach(r => {
        r.checked = (r.value === status);
      });

      roleModalOverlay.classList.remove('hidden');
      roleModalOverlay.classList.add('flex');
    });
  });

  function closeRoleModal() {
    roleModalOverlay.classList.add('hidden');
    roleModalOverlay.classList.remove('flex');
  }

  if (roleModalClose)  roleModalClose.addEventListener('click', closeRoleModal);
  if (btnModalCancel)  btnModalCancel.addEventListener('click', closeRoleModal);

  roleModalOverlay.addEventListener('click', (e) => {
    if (e.target === roleModalOverlay) {
      closeRoleModal();
    }
  });

  // (Tidak perlu JS untuk save, karena form submit normal)
</script>
@endpush
