@extends('layouts.dashboard')
@section('content')
         <!-- Content -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan -->
        <section class="grid gap-4 md:grid-cols-3">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Total record bulan
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">128</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Kombinasi RT/RW × bulan yang tercatat di sistem.
            </p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Bulan lengkap disetujui
            </p>
            <p class="mt-2 text-2xl font-semibold text-emerald-600">86</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Seluruh indikator disetujui verifikator.
            </p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Perlu perhatian
            </p>
            <p class="mt-2 text-2xl font-semibold text-amber-600">19</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Ada bukti yang ditolak atau belum dikirim.
            </p>
          </div>
        </section>

        <!-- Filter global -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="flex flex-wrap items-center justify-between gap-3 text-[11px]">
            <div class="space-y-1">
              <p class="font-semibold uppercase tracking-wider text-slate-500">
                Filter & pencarian
              </p>
              <p class="text-slate-600">
                Gunakan filter untuk fokus ke kecamatan, kelurahan, atau status tertentu.
              </p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
              <select
                id="filterTahun"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option value="all">Semua tahun</option>
                <option value="2025" selected>2025</option>
                <option value="2024">2024</option>
              </select>
              <select
                id="filterKecamatan"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option value="all">Semua kecamatan</option>
                <option value="Panakkukang">Panakkukang</option>
                <option value="Rappocini">Rappocini</option>
                <option value="Biringkanaya">Biringkanaya</option>
              </select>
              <select
                id="filterKelurahan"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option value="all">Semua kelurahan</option>
                <option value="Panakkukang">Panakkukang</option>
                <option value="Karunrung">Karunrung</option>
                <option value="Tamamaung">Tamamaung</option>
              </select>
              <select
                id="filterStatus"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option value="all">Semua status</option>
                <option value="draft">Belum dikirim</option>
                <option value="waiting">Menunggu verifikasi</option>
                <option value="partial">Sebagian disetujui</option>
                <option value="approved">Lengkap disetujui</option>
                <option value="issue">Perlu perbaikan</option>
              </select>
              <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-2 flex items-center text-[11px] text-slate-400">🔍</span>
                <input
                  id="searchRtRw"
                  type="text"
                  class="w-44 rounded-xl border border-slate-200 bg-slate-50 pl-6 pr-2 py-1.5 text-[11px] text-slate-700 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Cari RT/RW, nama RT, kelurahan..."
                />
              </div>
            </div>
          </div>
        </section>

        <!-- Tabel history -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="mb-3 flex items-center justify-between gap-2">
            <div>
              <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                History evidence per RT/RW
              </p>
              <p class="text-sm font-semibold text-slate-900">
                Rekap bukti bulanan per RT/RW
              </p>
            </div>
            <button
              class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
            >
              ⬇ Export (CSV)
            </button>
          </div>

          <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full border-collapse text-xs">
              <thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">
                <tr>
                  <th class="px-3 py-2 text-left">Periode</th>
                  <th class="px-3 py-2 text-left">RT/RW &amp; wilayah</th>
                  <th class="px-3 py-2 text-left">Status bukti</th>
                  <th class="px-3 py-2 text-left">Ringkasan verifikasi</th>
                  <th class="px-3 py-2 text-left">Status insentif</th>
                  <th class="px-3 py-2 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="historyBody" class="divide-y divide-slate-100">
                <!-- Contoh baris data -->

                <!-- 1: Panakkukang, RT01/RW05, November 2025 -->
                <tr
                  data-tahun="2025"
                  data-kecamatan="Panakkukang"
                  data-kelurahan="Panakkukang"
                  data-status="approved"
                  data-search="rt01 rw05 pak ahmad panakkukang"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">November 2025</p>
                    <p class="text-[11px] text-slate-500">Periode berjalan</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      RT 01 / RW 05
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Kel. Panakkukang • Kec. Panakkukang
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Ketua: Pak Ahmad
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Lengkap disetujui
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Terkirim: 24 Nov 2025
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      4 indikator • 4 bukti sah
                    </p>
                    <p class="text-[11px] text-slate-500">
                      4 disetujui • 0 ditolak • 0 perbaikan
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Insentif layak
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <a
                      href="#"
                      class="inline-flex items-center gap-1 rounded-full bg-mabisa-500 px-3 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
                    >
                      👁 Lihat
                    </a>
                  </td>
                </tr>

                <!-- 2: Panakkukang, RT02/RW05, November 2025 (waiting) -->
                <tr
                  data-tahun="2025"
                  data-kecamatan="Panakkukang"
                  data-kelurahan="Panakkukang"
                  data-status="waiting"
                  data-search="rt02 rw05 bu siti panakkukang"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">November 2025</p>
                    <p class="text-[11px] text-slate-500">Periode berjalan</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      RT 02 / RW 05
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Kel. Panakkukang • Kec. Panakkukang
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Ketua: Bu Siti
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[11px] font-medium text-amber-700">
                      Menunggu verifikasi
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Terkirim: 23 Nov 2025
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      4 indikator • 4 bukti terkirim
                    </p>
                    <p class="text-[11px] text-slate-500">
                      0 disetujui • 0 ditolak • 0 perbaikan
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-600">
                      Dalam proses
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <a
                      href="#"
                      class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                    >
                      👁 Lihat
                    </a>
                  </td>
                </tr>

                <!-- 3: Rappocini, RT03/RW07, Oktober 2025 (issue) -->
                <tr
                  data-tahun="2025"
                  data-kecamatan="Rappocini"
                  data-kelurahan="Karunrung"
                  data-status="issue"
                  data-search="rt03 rw07 pak budi karunrung rappocini"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Oktober 2025</p>
                    <p class="text-[11px] text-slate-500">Periode lampau</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      RT 03 / RW 07
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Kel. Karunrung • Kec. Rappocini
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Ketua: Pak Budi
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-rose-50 px-2 py-0.5 text-[11px] font-medium text-rose-700">
                      Perlu perbaikan
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      1 indikator diminta revisi
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      4 indikator • 3 bukti sah • 1 revisi
                    </p>
                    <p class="text-[11px] text-slate-500">
                      3 disetujui • 0 ditolak • 1 perbaikan
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[11px] font-medium text-amber-700">
                      Insentif tertahan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <a
                      href="#"
                      class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                    >
                      👁 Lihat
                    </a>
                  </td>
                </tr>

                <!-- 4: Biringkanaya, RT05/RW02, September 2025 (partial) -->
                <tr
                  data-tahun="2025"
                  data-kecamatan="Biringkanaya"
                  data-kelurahan="Tamamaung"
                  data-status="partial"
                  data-search="rt05 rw02 bu lina tamamaung biringkanaya"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">September 2025</p>
                    <p class="text-[11px] text-slate-500">Periode lampau</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      RT 05 / RW 02
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Kel. Tamamaung • Kec. Biringkanaya
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Ketua: Bu Lina
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-sky-50 px-2 py-0.5 text-[11px] font-medium text-sky-700">
                      Sebagian disetujui
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Ada bukti yang ditolak & tidak dikirim ulang
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      4 indikator • 3 bukti sah • 1 ditolak
                    </p>
                    <p class="text-[11px] text-slate-500">
                      3 disetujui • 1 ditolak • 0 perbaikan
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-600">
                      Insentif dipertimbangkan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <a
                      href="#"
                      class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                    >
                      👁 Lihat
                    </a>
                  </td>
                </tr>

                <!-- 5: Panakkukang, RT04/RW05, Desember 2024 (approved) -->
                <tr
                  data-tahun="2024"
                  data-kecamatan="Panakkukang"
                  data-kelurahan="Panakkukang"
                  data-status="approved"
                  data-search="rt04 rw05 pak rahmat panakkukang"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Desember 2024</p>
                    <p class="text-[11px] text-slate-500">Tahun sebelumnya</p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      RT 04 / RW 05
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Kel. Panakkukang • Kec. Panakkukang
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Ketua: Pak Rahmat
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Lengkap disetujui
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Semua indikator clear
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">
                      4 indikator • 4 bukti sah
                    </p>
                    <p class="text-[11px] text-slate-500">
                      4 disetujui • 0 ditolak • 0 perbaikan
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Insentif diberikan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <a
                      href="#"
                      class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                    >
                      👁 Lihat
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="mt-3 text-[11px] text-slate-500">
            Tombol <strong>“Lihat”</strong> bisa diarahkan ke halaman detail admin, misalnya:
            <code>/admin/history/{rt_rw_id}/{tahun}/{bulan}</code> yang menampilkan breakdown evidence seperti halaman detail RT, tapi dengan informasi audit/log lebih lengkap.
          </p>
        </section>
      </main>
@endsection