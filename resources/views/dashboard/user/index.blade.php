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
            <p class="mt-2 text-2xl font-semibold text-mabisa-600">124</p>
            <p class="mt-1 text-[11px] text-slate-500">Semua peran di MABISA.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW terdaftar
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">72</p>
            <p class="mt-1 text-[11px] text-slate-500">Memiliki akses upload bukti.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Verifikator aktif
            </p>
            <p class="mt-2 text-2xl font-semibold text-emerald-600">18</p>
            <p class="mt-1 text-[11px] text-slate-500">Lurah, Camat, dan OPD teknis.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Akun terkunci
            </p>
            <p class="mt-2 text-2xl font-semibold text-rose-600">4</p>
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
                <!-- Contoh row: Super Admin -->
                <tr class="hover:bg-slate-50/80" data-name="Andi Gigatera" data-email="andi.gigatera@makassarkota.go.id" data-role="Admin Kota" data-status="Aktif">
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Andi Gigatera Halil M.</p>
                    <p class="text-[11px] text-slate-500">andi.gigatera@makassarkota.go.id</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[11px] font-medium text-mabisa-700">
                      Admin Kota
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">Akses penuh konfigurasi &amp; laporan.</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">BRIDA Kota Makassar</p>
                    <p class="text-[11px] text-slate-500">Level kota</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Aktif
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">18 Nov 2025 • 09.41</p>
                    <p class="text-[11px] text-slate-500">Chrome • Windows</p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button
                      class="btn-role rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                    >
                      Atur hak akses
                    </button>
                  </td>
                </tr>

                <!-- Row: Lurah / Verifikator -->
                <tr class="hover:bg-slate-50/80" data-name="Siti Rahma" data-email="siti.rahma@makassarkota.go.id" data-role="Lurah • Verifikator" data-status="Aktif">
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Siti Rahma</p>
                    <p class="text-[11px] text-slate-500">siti.rahma@makassarkota.go.id</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <div class="flex flex-wrap gap-1">
                      <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-700">
                        Lurah
                      </span>
                      <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] text-emerald-700">
                        Verifikator
                      </span>
                    </div>
                    <p class="mt-0.5 text-[11px] text-slate-500">Verifikasi bukti kelurahan.</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Kelurahan Panakkukang</p>
                    <p class="text-[11px] text-slate-500">Kecamatan Panakkukang</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Aktif
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">18 Nov 2025 • 08.12</p>
                    <p class="text-[11px] text-slate-500">Chrome • Android</p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button class="btn-role rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60">
                      Atur hak akses
                    </button>
                  </td>
                </tr>

                <!-- Row: RT/RW -->
                <tr class="hover:bg-slate-50/80" data-name="Budi Santoso" data-email="rt01-rw05@makassar.go.id" data-role="RT/RW" data-status="Aktif">
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Budi Santoso</p>
                    <p class="text-[11px] text-slate-500">rt01-rw05@makassar.go.id</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-700">
                      RT/RW
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">Hanya upload bukti &amp; lihat statusnya.</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">RT 01 / RW 05</p>
                    <p class="text-[11px] text-slate-500">Kel. Panakkukang</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Aktif
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">17 Nov 2025 • 19.40</p>
                    <p class="text-[11px] text-slate-500">Chrome • Android</p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button class="btn-role rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60">
                      Atur hak akses
                    </button>
                  </td>
                </tr>

                <!-- Row: Akun terkunci -->
                <tr class="hover:bg-slate-50/80" data-name="Joko Pratama" data-email="joko.pratama@makassarkota.go.id" data-role="Verifikator OPD" data-status="Terkunci">
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Joko Pratama</p>
                    <p class="text-[11px] text-slate-500">joko.pratama@makassarkota.go.id</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] text-emerald-700">
                      Verifikator OPD
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">Audit kinerja &amp; bukti tertentu.</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Dinas Pekerjaan Umum</p>
                    <p class="text-[11px] text-slate-500">Level kota</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-rose-50 px-2 py-0.5 text-[11px] font-medium text-rose-700">
                      Terkunci
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">15 Nov 2025 • 22.05</p>
                    <p class="text-[11px] text-slate-500">Percobaan login gagal 5x</p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button class="btn-role rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60">
                      Atur hak akses
                    </button>
                  </td>
                </tr>
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
            class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
          >
            <option>RT/RW</option>
            <option>Lurah</option>
            <option>Camat</option>
            <option>Verifikator OPD</option>
            <option>Admin Kota</option>
            <option>Super Admin</option>
          </select>

          <div class="space-y-1">
            <p class="mt-2 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
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

        <!-- Hak verifikasi & scope -->
        <div class="space-y-2">
          <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Hak verifikasi &amp; scope
          </p>
          <div class="space-y-2">
            <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
              <input id="chkVerifikator" type="checkbox" />
              <span class="text-[11px] text-slate-700">User ini adalah verifikator</span>
            </label>
            <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
              <input id="chkKelolaIndikator" type="checkbox" />
              <span class="text-[11px] text-slate-700">Boleh mengelola indikator manajemen</span>
            </label>
            <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
              <input id="chkKelolaUser" type="checkbox" />
              <span class="text-[11px] text-slate-700">Boleh mengelola user lain</span>
            </label>
          </div>

          <div class="grid gap-2 mt-2">
            <div class="space-y-1.5">
              <label class="block text-[11px] font-medium text-slate-600">Level wilayah</label>
              <select
                id="modalScopeLevel"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
              >
                <option>RT/RW</option>
                <option>Kelurahan</option>
                <option>Kecamatan</option>
                <option>Kota</option>
              </select>
            </div>
            <div class="space-y-1.5">
              <label class="block text-[11px] font-medium text-slate-600">Catatan admin (opsional)</label>
              <textarea
                id="modalNote"
                rows="2"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                placeholder="Contoh: hanya verifikasi untuk Kecamatan Panakkukang."
              ></textarea>
            </div>
          </div>
        </div>
      </div>

      <!-- Tombol modal -->
      <div class="mt-4 flex flex-wrap items-center justify-between gap-2 text-[11px]">
        <div class="space-y-1 text-slate-500">
          <p>
            Perubahan ini akan tercatat di log aktivitas admin.
          </p>
          <p>
            Pastikan peran dan status sesuai dengan SK penugasan yang berlaku.
          </p>
        </div>
        <div class="flex flex-wrap gap-2">
          <button
            id="btnModalSave"
            class="rounded-xl bg-mabisa-500 px-3.5 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
          >
            💾 Simpan perubahan
          </button>
          <button
            id="btnModalCancel"
            class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-[11px] text-slate-600 hover:bg-slate-50"
          >
            Batalkan
          </button>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
      <!-- JS -->
  <script>
    // Sidebar toggle (mobile)
    const sidebar = document.getElementById('sidebar');
    const sidebarOpen = document.getElementById('sidebar-open');
    const sidebarClose = document.getElementById('sidebar-close');

    if (window.innerWidth < 768) {
      sidebar.classList.add('-translate-x-full');
    }

    if (sidebarOpen) {
      sidebarOpen.addEventListener('click', () => {
        sidebar.classList.remove('-translate-x-full');
      });
    }

    if (sidebarClose) {
      sidebarClose.addEventListener('click', () => {
        sidebar.classList.add('-translate-x-full');
      });
    }

    // Modal elements
    const roleModalOverlay = document.getElementById('roleModalOverlay');
    const roleModalClose = document.getElementById('roleModalClose');
    const btnModalCancel = document.getElementById('btnModalCancel');
    const btnModalSave = document.getElementById('btnModalSave');
    const modalUserName = document.getElementById('modalUserName');
    const modalUserEmail = document.getElementById('modalUserEmail');
    const modalRoleMain = document.getElementById('modalRoleMain');

    // Open modal on "Atur hak akses"
    document.querySelectorAll('.btn-role').forEach(btn => {
      btn.addEventListener('click', () => {
        const row = btn.closest('tr');
        const name = row.getAttribute('data-name');
        const email = row.getAttribute('data-email');
        const role = row.getAttribute('data-role');
        const status = row.getAttribute('data-status');

        // Set text
        modalUserName.textContent = name || 'Nama User';
        modalUserEmail.textContent = email || '';
        // Set main role (simple match)
        Array.from(modalRoleMain.options).forEach(opt => {
          if (role && role.includes(opt.text)) {
            modalRoleMain.value = opt.text;
          }
        });
        // Set status radio
        document.querySelectorAll('input[name="modalStatus"]').forEach(r => {
          r.checked = (r.value === status);
        });

        roleModalOverlay.classList.remove('hidden');
        roleModalOverlay.classList.add('flex');
      });
    });

    // Close modal function
    function closeRoleModal() {
      roleModalOverlay.classList.add('hidden');
      roleModalOverlay.classList.remove('flex');
    }

    if (roleModalClose) roleModalClose.addEventListener('click', closeRoleModal);
    if (btnModalCancel) btnModalCancel.addEventListener('click', closeRoleModal);
    roleModalOverlay.addEventListener('click', (e) => {
      if (e.target === roleModalOverlay) {
        closeRoleModal();
      }
    });

    // Save (dummy)
    if (btnModalSave) {
      btnModalSave.addEventListener('click', () => {
        alert('Di versi Laravel nanti, perubahan peran/hak akses akan disimpan ke database dan dicatat di log admin.');
        closeRoleModal();
      });
    }

    // Pencarian sederhana (front-end filter)
    const searchInput = document.getElementById('searchUser');
    const filterRole = document.getElementById('filterRole');
    const filterStatus = document.getElementById('filterStatus');
    const userRows = document.querySelectorAll('#userTableBody tr');

    function filterUsers() {
      const q = (searchInput?.value || '').toLowerCase();
      const r = filterRole?.value || '';
      const s = filterStatus?.value || '';

      userRows.forEach(row => {
        const name = (row.getAttribute('data-name') || '').toLowerCase();
        const email = (row.getAttribute('data-email') || '').toLowerCase();
        const role = row.getAttribute('data-role') || '';
        const status = row.getAttribute('data-status') || '';

        const matchText = !q || name.includes(q) || email.includes(q);
        const matchRole = !r || role.includes(r);
        const matchStatus = !s || status === s;

        if (matchText && matchRole && matchStatus) {
          row.classList.remove('hidden');
        } else {
          row.classList.add('hidden');
        }
      });
    }

    if (searchInput) searchInput.addEventListener('input', filterUsers);
    if (filterRole) filterRole.addEventListener('change', filterUsers);
    if (filterStatus) filterStatus.addEventListener('change', filterUsers);
  </script>
@endpush