@extends('layouts.dashboard')

@section('content')
       <!-- CONTENT -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan -->
        <section class="grid gap-4 md:grid-cols-4">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW di wilayah Anda
            </p>
            <p class="mt-2 text-2xl font-semibold text-mabisa-600">24</p>
            <p class="mt-1 text-[11px] text-slate-500">Terdaftar dalam MABISA.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW butuh verifikasi
            </p>
            <p class="mt-2 text-2xl font-semibold text-amber-600">7</p>
            <p class="mt-1 text-[11px] text-slate-500">Memiliki evidence pending.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW on track
            </p>
            <p class="mt-2 text-2xl font-semibold text-emerald-600">15</p>
            <p class="mt-1 text-[11px] text-slate-500">Mayoritas evidencenya disetujui.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW bermasalah
            </p>
            <p class="mt-2 text-2xl font-semibold text-rose-600">2</p>
            <p class="mt-1 text-[11px] text-slate-500">Sering terlambat atau banyak ditolak.</p>
          </div>
        </section>

        <!-- Filter & tab -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="flex flex-wrap items-center justify-between gap-3">
            <!-- Tabs status RT/RW -->
            <div class="inline-flex gap-1 rounded-full bg-slate-50 p-1 text-[11px]">
              <button
                data-tab="all"
                class="tab-btn rounded-full bg-white px-3 py-1.5 font-medium text-slate-800 shadow-soft"
              >
                Semua
              </button>
              <button
                data-tab="butuh_cek"
                class="tab-btn rounded-full px-3 py-1.5 text-slate-600"
              >
                Perlu perhatian
              </button>
              <button
                data-tab="aman"
                class="tab-btn rounded-full px-3 py-1.5 text-slate-600"
              >
                On track
              </button>
              <button
                data-tab="bermasalah"
                class="tab-btn rounded-full px-3 py-1.5 text-slate-600"
              >
                Bermasalah
              </button>
            </div>

            <!-- Filter kanan -->
            <div class="flex flex-wrap items-center gap-2 text-[11px]">
              <select
                id="filterPeriode"
                class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
              >
                <option>Periode: Bulan ini</option>
                <option>Periode: Minggu ini</option>
                <option>Periode: Triwulan ini</option>
              </select>
              <select
                id="filterKelurahan"
                class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
              >
                <option>Kel. Panakkukang (Anda)</option>
                <option disabled>Kelurahan lain (hanya contoh)</option>
              </select>
            </div>
          </div>

          <!-- Search -->
          <div class="mt-4 flex flex-wrap items-center justify-between gap-3">
            <div class="relative flex-1 max-w-md">
              <span class="pointer-events-none absolute inset-y-0 left-3 flex items-center text-slate-400 text-xs">🔍</span>
              <input
                id="searchRT"
                type="text"
                class="w-full rounded-xl border border-slate-200 bg-slate-50 pl-7 pr-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                placeholder="Cari RT/RW atau nama ketua..."
              />
            </div>
            <button
              class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
            >
              🔄 Refresh rekap
            </button>
          </div>
        </section>

        <!-- Tabel RT/RW -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="mb-3 flex items-center justify-between gap-2">
            <div>
              <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Daftar RT/RW
              </p>
              <p class="text-sm font-semibold text-slate-900">
                Ringkasan evidence per RT/RW
              </p>
            </div>
            <p class="text-[11px] text-slate-500">
              Klik <strong>“Lihat evidence”</strong> untuk melihat detail bukti per RT/RW.
            </p>
          </div>

          <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full border-collapse text-xs">
              <thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">
                <tr>
                  <th class="px-3 py-2 text-left">RT/RW &amp; ketua</th>
                  <th class="px-3 py-2 text-left">Wilayah</th>
                  <th class="px-3 py-2 text-left">Ringkasan evidence</th>
                  <th class="px-3 py-2 text-left">Skor &amp; kategori</th>
                  <th class="px-3 py-2 text-left">Status verifikasi</th>
                  <th class="px-3 py-2 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="rtTableBody" class="divide-y divide-slate-100">
                <!-- Row 1: butuh cek -->
                <tr
                  class="hover:bg-slate-50/80"
                  data-status="butuh_cek"
                  data-rt="rt 01 / rw 05"
                  data-ketua="Budi Santoso"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">RT 01 / RW 05</p>
                    <p class="text-[11px] text-slate-500">Ketua: Budi Santoso</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Lingkungan A</p>
                    <p class="text-[11px] text-slate-500">Kel. Panakkukang</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Pending: <span class="font-semibold text-amber-700">4</span> bukti
                    </p>
                    <p class="text-[11px] text-slate-700">
                      Disetujui: <span class="font-semibold text-emerald-700">12</span> • Ditolak: <span class="font-semibold text-rose-700">2</span>
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Pending tertua: 3+ hari lalu.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Skor estimasi: <span class="font-semibold text-slate-900">78/100</span>
                    </p>
                    <p class="text-[11px] text-amber-700">
                      Kategori: Perlu perhatian
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[11px] font-medium text-amber-700">
                      Perlu verifikasi lanjutan
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">
                      Ada bukti yang belum diperiksa.
                    </p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <a
                      class="btn-evidence rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      data-rt-id="RT01-RW05"
                      href="{{ route('dashboard.verification.show') }}"
                    >
                      Lihat evidence
                  </a>
                  </td>
                </tr>

                <!-- Row 2: aman -->
                <tr
                  class="hover:bg-slate-50/80"
                  data-status="aman"
                  data-rt="rt 02 / rw 05"
                  data-ketua="Rahmat Hidayat"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">RT 02 / RW 05</p>
                    <p class="text-[11px] text-slate-500">Ketua: Rahmat Hidayat</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Lingkungan B</p>
                    <p class="text-[11px] text-slate-500">Kel. Panakkukang</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Pending: <span class="font-semibold text-slate-700">1</span> bukti
                    </p>
                    <p class="text-[11px] text-slate-700">
                      Disetujui: <span class="font-semibold text-emerald-700">15</span> • Ditolak: <span class="font-semibold text-rose-700">1</span>
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Mayoritas sudah diverifikasi.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Skor estimasi: <span class="font-semibold text-slate-900">88/100</span>
                    </p>
                    <p class="text-[11px] text-emerald-700">
                      Kategori: On track
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Terkendali
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">
                      Bisa diverifikasi sambil jalan.
                    </p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button
                      class="btn-evidence rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      data-rt-id="RT02-RW05"
                    >
                      Lihat evidence
                    </button>
                  </td>
                </tr>

                <!-- Row 3: bermasalah -->
                <tr
                  class="hover:bg-slate-50/80"
                  data-status="bermasalah"
                  data-rt="rt 03 / rw 06"
                  data-ketua="Lina Marlina"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">RT 03 / RW 06</p>
                    <p class="text-[11px] text-slate-500">Ketua: Lina Marlina</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Lingkungan C</p>
                    <p class="text-[11px] text-slate-500">Kel. Panakkukang</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Pending: <span class="font-semibold text-amber-700">6</span> bukti
                    </p>
                    <p class="text-[11px] text-slate-700">
                      Disetujui: <span class="font-semibold text-emerald-700">5</span> • Ditolak: <span class="font-semibold text-rose-700">4</span>
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Banyak evidence lewat batas waktu.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Skor estimasi: <span class="font-semibold text-slate-900">61/100</span>
                    </p>
                    <p class="text-[11px] text-rose-700">
                      Kategori: Bermasalah
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-rose-50 px-2 py-0.5 text-[11px] font-medium text-rose-700">
                      Perlu pendampingan
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">
                      Disarankan ada komunikasi khusus.
                    </p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button
                      class="btn-evidence rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      data-rt-id="RT03-RW06"
                    >
                      Lihat evidence
                    </button>
                  </td>
                </tr>

                <!-- Row 4: aman -->
                <tr
                  class="hover:bg-slate-50/80"
                  data-status="aman"
                  data-rt="rt 04 / rw 06"
                  data-ketua="Jamaluddin"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">RT 04 / RW 06</p>
                    <p class="text-[11px] text-slate-500">Ketua: Jamaluddin</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Lingkungan D</p>
                    <p class="text-[11px] text-slate-500">Kel. Panakkukang</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Pending: <span class="font-semibold text-slate-700">0</span> bukti
                    </p>
                    <p class="text-[11px] text-slate-700">
                      Disetujui: <span class="font-semibold text-emerald-700">10</span> • Ditolak: <span class="font-semibold text-rose-700">0</span>
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Semua evidence sudah diverifikasi.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      Skor estimasi: <span class="font-semibold text-slate-900">92/100</span>
                    </p>
                    <p class="text-[11px] text-emerald-700">
                      Kategori: Sangat baik
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Tidak ada pending
                    </span>
                    <p class="mt-0.5 text-[11px] text-slate-500">
                      RT ini bisa dijadikan contoh.
                    </p>
                  </td>
                  <td class="px-3 py-2 text-center align-top">
                    <button
                      class="btn-evidence rounded-lg border border-slate-200 bg-white px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      data-rt-id="RT04-RW06"
                    >
                      Lihat evidence
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="mt-3 text-[11px] text-slate-500">
            Halaman berikutnya (<strong>evidence per RT/RW</strong>) bisa diakses lewat route seperti:
            <code>/verifikator/rt/{id}/evidence</code> di Laravel.
          </p>
        </section>

        <!-- Info teknis -->
        <section class="mt-2 rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-[11px] text-slate-600">
          <p class="font-semibold mb-1 text-slate-900">Catatan implementasi (untuk tim teknis)</p>
          <ul class="list-disc space-y-1 pl-4">
            <li>
              Query yang ditampilkan di tabel ini sebaiknya berupa <strong>aggregasi per RT/RW</strong>:
              hitung jumlah evidence pending, disetujui, dan ditolak.
            </li>
            <li>
              Skor estimasi bisa dihitung dari kombinasi indikator (misalnya di tabel rekap skor per RT/RW per periode).
            </li>
            <li>
              Tombol <code>Lihat evidence</code> tinggal diarahkan ke route detail
              <code>/verifikator/rt/{rt_rw_id}/evidence</code> yang menampilkan list bukti milik RT/RW tersebut.
            </li>
          </ul>
        </section>
      </main>
@endsection