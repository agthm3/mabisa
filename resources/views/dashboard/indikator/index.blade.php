@extends('layouts.dashboard')

@section('content')
         <!-- CONTENT -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan konfigurasi -->
        <section class="grid gap-4 md:grid-cols-4">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Indikator aktif
            </p>
            <p class="mt-2 text-2xl font-semibold text-mabisa-600">7</p>
            <p class="mt-1 text-[11px] text-slate-500">Terbagi dalam 3 kategori utama.</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Total bobot aktif
            </p>
            <p id="totalBobot" class="mt-2 text-2xl font-semibold text-emerald-600">100%</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Disarankan total bobot = 100% untuk satu periode.
            </p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Level penggunaan
            </p>
            <p class="mt-2 text-sm font-semibold text-slate-900">
              RT/RW • Lurah • Camat • Admin
            </p>
            <p class="mt-1 text-[11px] text-slate-500">
              Setiap indikator bisa diatur muncul di level mana.
            </p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Terakhir diubah
            </p>
            <p class="mt-2 text-sm font-semibold text-slate-900">18 November 2025</p>
            <p class="mt-1 text-[11px] text-slate-500">Oleh: Andi Gigatera (Admin Kota)</p>
          </div>
        </section>

        <!-- Daftar indikator + Form -->
        <section class="grid gap-6 lg:grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)]">
          <!-- Daftar indikator -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
            <div class="mb-3 flex flex-wrap items-center justify-between gap-2">
              <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                  Daftar indikator
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Indikator penilaian kinerja RT/RW
                </p>
              </div>
              <div class="flex flex-wrap items-center gap-2 text-[11px]">
                <select
                  class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
                >
                  <option>Semua kategori</option>
                  <option>Kepatuhan</option>
                  <option>Proses &amp; waktu</option>
                  <option>Kualitas data</option>
                </select>
                <select
                  class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
                >
                  <option>Semua level</option>
                  <option>RT/RW</option>
                  <option>Lurah</option>
                  <option>Camat</option>
                  <option>Admin Kota</option>
                </select>
              </div>
            </div>

            <div class="overflow-hidden rounded-2xl border border-slate-200">
              <table class="min-w-full border-collapse text-xs">
                <thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">
                  <tr>
                    <th class="px-3 py-2 text-left">Indikator</th>
                    <th class="px-3 py-2 text-left">Kategori</th>
                    <th class="px-3 py-2 text-left">Jenis</th>
                    <th class="px-3 py-2 text-center">Bobot</th>
                    <th class="px-3 py-2 text-left">Level</th>
                    <th class="px-3 py-2 text-center">Status</th>
                    <th class="px-3 py-2 text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                  <!-- Row 1 -->
                  <tr class="hover:bg-slate-50/80">
                    <td class="px-3 py-2 align-top">
                      <p class="font-semibold text-slate-900">
                        Kepatuhan upload bukti bulanan
                      </p>
                      <p class="text-[11px] text-slate-500">
                        Persentase RT/RW yang mengunggah bukti tiap bulan.
                      </p>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-700">
                        Kepatuhan
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">Skor 0–100</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[11px] font-semibold text-mabisa-700">
                        30%
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">RT/RW, Lurah, Camat, Admin</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                        Aktif
                      </span>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <button
                        class="rounded-lg border border-slate-200 bg-white px-2 py-0.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      >
                        Ubah
                      </button>
                      <button
                        class="mt-1 rounded-lg border border-rose-100 bg-rose-50 px-2 py-0.5 text-[11px] text-rose-700 hover:border-rose-200"
                      >
                        Hapus
                      </button>
                    </td>
                  </tr>
                  <!-- Row 2 -->
                  <tr class="hover:bg-slate-50/80">
                    <td class="px-3 py-2 align-top">
                      <p class="font-semibold text-slate-900">
                        Rata-rata waktu verifikasi bukti
                      </p>
                      <p class="text-[11px] text-slate-500">
                        Hari yang dibutuhkan dari upload sampai status final.
                      </p>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-700">
                        Proses &amp; waktu
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">Rata-rata hari</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[11px] font-semibold text-mabisa-700">
                        25%
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">Lurah, Camat, Admin</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                        Aktif
                      </span>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <button class="rounded-lg border border-slate-200 bg-white px-2 py-0.5 text-[11px] text-slate-700">
                        Ubah
                      </button>
                      <button
                        class="mt-1 rounded-lg border border-rose-100 bg-rose-50 px-2 py-0.5 text-[11px] text-rose-700"
                      >
                        Hapus
                      </button>
                    </td>
                  </tr>
                  <!-- Row 3 -->
                  <tr class="hover:bg-slate-50/80">
                    <td class="px-3 py-2 align-top">
                      <p class="font-semibold text-slate-900">
                        Persentase bukti dikoreksi/diulang
                      </p>
                      <p class="text-[11px] text-slate-500">
                        Mengukur kualitas pengisian dan kepatuhan terhadap format.
                      </p>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-700">
                        Kualitas data
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">% koreksi</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[11px] font-semibold text-mabisa-700">
                        15%
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">Lurah, Camat, Admin</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                        Aktif
                      </span>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <button class="rounded-lg border border-slate-200 bg-white px-2 py-0.5 text-[11px] text-slate-700">
                        Ubah
                      </button>
                      <button
                        class="mt-1 rounded-lg border border-rose-100 bg-rose-50 px-2 py-0.5 text-[11px] text-rose-700"
                      >
                        Hapus
                      </button>
                    </td>
                  </tr>
                  <!-- Row 4 (contoh indikator non-aktif) -->
                  <tr class="bg-slate-50/40 hover:bg-slate-50">
                    <td class="px-3 py-2 align-top">
                      <p class="font-semibold text-slate-900">
                        Kehadiran rapat koordinasi RT/RW
                      </p>
                      <p class="text-[11px] text-slate-500">
                        Mengukur partisipasi RT/RW dalam rapat resmi pemerintah.
                      </p>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-700">
                        Partisipasi
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">Jumlah kehadiran</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[11px] font-semibold text-slate-500">
                        10%
                      </span>
                    </td>
                    <td class="px-3 py-2 align-top">
                      <p class="text-[11px] text-slate-700">Lurah, Camat, Admin</p>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <span class="rounded-full bg-slate-100 px-2 py-0.5 text-[11px] font-medium text-slate-600">
                        Non-aktif
                      </span>
                    </td>
                    <td class="px-3 py-2 text-center align-top">
                      <button class="rounded-lg border border-slate-200 bg-white px-2 py-0.5 text-[11px] text-slate-700">
                        Aktifkan
                      </button>
                      <button
                        class="mt-1 rounded-lg border border-rose-100 bg-rose-50 px-2 py-0.5 text-[11px] text-rose-700"
                      >
                        Hapus
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>

            <p class="mt-3 text-[11px] text-slate-500">
              Catatan: Perubahan bobot dan penambahan indikator akan mempengaruhi perhitungan skor kinerja RT/RW pada periode berikutnya.
            </p>
          </div>

          <!-- Form tambah/ubah indikator -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                  Kelola indikator
                </p>
                <p id="formTitle" class="text-sm font-semibold text-slate-900">
                  Tambah indikator baru
                </p>
              </div>
              <button
                id="btn-reset-form"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
              >
                Reset form
              </button>
            </div>

            <form class="space-y-3 text-xs">
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Nama indikator</label>
                <input
                  type="text"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Contoh: Kepatuhan upload bukti bulanan"
                />
              </div>

              <div class="grid gap-3 sm:grid-cols-2">
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Kode indikator</label>
                  <input
                    type="text"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                    placeholder="Contoh: IND-01"
                  />
                </div>
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Kategori</label>
                  <select
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  >
                    <option value="">Pilih kategori</option>
                    <option>Kepatuhan</option>
                    <option>Proses &amp; waktu</option>
                    <option>Kualitas data</option>
                    <option>Partisipasi</option>
                    <option>Lainnya</option>
                  </select>
                </div>
              </div>

              <div class="grid gap-3 sm:grid-cols-2">
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Jenis nilai</label>
                  <select
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  >
                    <option value="">Pilih jenis nilai</option>
                    <option>Skor 0–100</option>
                    <option>Persentase (%)</option>
                    <option>Jumlah (kali / kegiatan)</option>
                    <option>Boolean (Ya/Tidak)</option>
                    <option>Durasi (hari)</option>
                  </select>
                </div>
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Bobot (%)</label>
                  <input
                    id="bobotInput"
                    type="number"
                    min="0"
                    max="100"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                    placeholder="Contoh: 10"
                  />
                  <p class="text-[10px] text-slate-500">
                    Total semua indikator idealnya berjumlah <strong>100%</strong>.
                  </p>
                </div>
              </div>

              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Level penggunaan</label>
                <div class="grid gap-2 sm:grid-cols-2">
                  <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
                    <input type="checkbox" checked />
                    <span class="text-[11px] text-slate-700">RT/RW</span>
                  </label>
                  <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
                    <input type="checkbox" checked />
                    <span class="text-[11px] text-slate-700">Lurah</span>
                  </label>
                  <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
                    <input type="checkbox" checked />
                    <span class="text-[11px] text-slate-700">Camat</span>
                  </label>
                  <label class="flex items-center gap-2 rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1.5">
                    <input type="checkbox" checked />
                    <span class="text-[11px] text-slate-700">Admin Kota</span>
                  </label>
                </div>
              </div>

              <div class="grid gap-3 sm:grid-cols-2">
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Status indikator</label>
                  <select
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  >
                    <option>Aktif</option>
                    <option>Non-aktif</option>
                  </select>
                </div>
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Urutan tampil</label>
                  <input
                    type="number"
                    min="1"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                    placeholder="Contoh: 1"
                  />
                </div>
              </div>

              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Deskripsi indikator</label>
                <textarea
                  rows="3"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Jelaskan secara singkat apa yang diukur oleh indikator ini."
                ></textarea>
              </div>

              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Catatan perhitungan (opsional)</label>
                <textarea
                  rows="2"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Contoh: Skor = (jumlah RT/RW upload / total RT/RW) x 100"
                ></textarea>
                <p class="text-[10px] text-slate-500">
                  Catatan ini membantu tim teknis &amp; verifikator memahami cara sistem menghitung skor.
                </p>
              </div>

              <div class="flex flex-wrap gap-2 pt-1">
                <button
                  type="button"
                  id="btn-save-bottom"
                  class="rounded-xl bg-mabisa-500 px-3.5 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
                >
                  💾 Simpan indikator
                </button>
                <button
                  type="button"
                  class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-[11px] text-slate-600 hover:bg-slate-50"
                >
                  Simpan &amp; tambah baru
                </button>
              </div>
            </form>
          </div>
        </section>

        <!-- Info kecil -->
        <section class="mt-2 rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-[11px] text-slate-600">
          <p class="font-semibold mb-1 text-slate-900">Catatan implementasi (untuk tim teknis)</p>
          <ul class="list-disc space-y-1 pl-4">
            <li>Indikator disarankan disimpan di tabel khusus, misalnya <code>mabisa_indicators</code>.</li>
            <li>
              Simpan informasi: nama, kode, kategori, jenis_nilai, bobot, level_pengguna (bisa JSON), status, urutan,
              deskripsi, dan rumus/perhitungan.
            </li>
            <li>
              Perubahan bobot dan penambahan indikator sebaiknya dicatat di log konfigurasi untuk audit (siapa mengubah apa, dan kapan).
            </li>
          </ul>
        </section>
      </main>
@endsection