@extends('layouts.dashboard')
@section('content')
          <!-- Content -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan -->
        <section class="grid gap-4 md:grid-cols-[minmax(0,1.4fr)_minmax(0,0.8fr)]">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Rekap periode November 2025
            </p>
            <div class="mt-3 grid gap-2 sm:grid-cols-3">
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="text-[11px] text-slate-500">Total indikator</p>
                <p class="text-xl font-semibold text-slate-900">4</p>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="text-[11px] text-slate-500">Bukti sah (disetujui)</p>
                <p class="text-xl font-semibold text-emerald-600">3</p>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="text-[11px] text-slate-500">Perbaikan / catatan</p>
                <p class="text-xl font-semibold text-amber-600">1</p>
              </div>
            </div>
            <p class="mt-3 text-[11px] text-slate-500">
              Riwayat ini sudah <strong>terkunci</strong>. Perubahan hanya bisa dilakukan melalui pengajuan resmi ke kelurahan/kecamatan.
            </p>
          </div>

          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Status insentif
            </p>
            <p class="mt-2 text-sm font-semibold text-slate-900">
              Insentif bulan November 2025
            </p>
            <p class="text-[11px] text-slate-600">
              Berdasarkan bukti yang disetujui oleh Lurah & Camat.
            </p>
            <div class="mt-3 flex items-center justify-between gap-3">
              <div>
                <p class="text-[11px] text-slate-500">Status</p>
                <p class="text-[13px] font-semibold text-emerald-700">
                  Layak insentif
                </p>
              </div>
              <span class="rounded-full bg-emerald-50 px-3 py-1 text-[11px] font-medium text-emerald-700">
                Disetujui
              </span>
            </div>
            <p class="mt-2 text-[11px] text-slate-500">
              Keterangan verifikator: <span class="italic">“Bukti sudah lengkap dan sesuai indikator yang berlaku.”</span>
            </p>
          </div>
        </section>

        <!-- Filter evidence -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="flex flex-wrap items-center justify-between gap-3 text-[11px]">
            <div class="space-y-1">
              <p class="font-semibold uppercase tracking-wider text-slate-500">
                Filter evidence
              </p>
              <p class="text-slate-600">
                Gunakan filter untuk fokus ke kategori atau status tertentu.
              </p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
              <select
                id="filterKategori"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option value="all">Semua kategori</option>
                <option value="Kebersihan">Kebersihan</option>
                <option value="Keamanan">Keamanan</option>
                <option value="Sosial">Sosial</option>
                <option value="Administrasi">Administrasi</option>
              </select>
              <select
                id="filterStatus"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option value="all">Semua status</option>
                <option value="approved">Disetujui</option>
                <option value="revised">Perlu perbaikan</option>
                <option value="rejected">Ditolak</option>
              </select>
              <div class="relative">
                <span class="pointer-events-none absolute inset-y-0 left-2 flex items-center text-[11px] text-slate-400">🔍</span>
                <input
                  id="searchJudul"
                  type="text"
                  class="w-40 rounded-xl border border-slate-200 bg-slate-50 pl-6 pr-2 py-1.5 text-[11px] text-slate-700 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Cari judul..."
                />
              </div>
            </div>
          </div>
        </section>

        <!-- LIST EVIDENCE (langsung tampil gambar/pdf) -->
        <section class="space-y-4">
          <!-- Card evidence -->
          <article
            class="evidence-card rounded-3xl border border-slate-200 bg-white p-4 shadow-soft"
            data-kategori="Kebersihan"
            data-status="approved"
            data-title="kerja bakti kebersihan lingkungan"
            data-type="image"
          >
            <div class="flex flex-wrap items-start justify-between gap-3">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Kebersihan • Indikator 1
                </p>
                <h2 class="text-sm font-semibold text-slate-900">
                  Kerja bakti kebersihan lingkungan
                </h2>
                <p class="text-[11px] text-slate-500">
                  Dokumentasi kerja bakti membersihkan jalan utama, selokan, dan area depan rumah warga.
                </p>
              </div>
              <div class="text-right text-[11px]">
                <p class="text-slate-500">Tanggal kegiatan</p>
                <p class="font-semibold text-slate-800">10 November 2025</p>
                <p class="text-slate-500">Upload: 11 November 2025 • 09.15</p>
              </div>
            </div>

            <div class="mt-3 grid gap-3 md:grid-cols-[minmax(0,1.4fr)_minmax(0,0.8fr)]">
              <!-- Preview foto -->
              <div>
                <div class="aspect-video w-full rounded-2xl border border-slate-200 bg-slate-100 flex items-center justify-center text-[11px] text-slate-400">
                  Foto kegiatan (arsip) — placeholder
                </div>
                <p class="mt-1 text-[11px] text-slate-500">
                  Di sistem sebenarnya, foto akan diambil dari storage MABISA (misalnya <code>storage/app/public/mabisa/rt01/nov2025-kebersihan-1.jpg</code>).
                </p>
              </div>

              <!-- Info status -->
              <div class="space-y-2 text-[11px]">
                <div>
                  <p class="text-slate-500">Status verifikasi</p>
                  <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 font-medium text-emerald-700">
                    ✅ Disetujui
                  </span>
                </div>
                <div>
                  <p class="text-slate-500">Catatan verifikator</p>
                  <p class="text-slate-700">
                    “Bukti sudah jelas, kegiatan sesuai jadwal kerja bakti bulanan lingkungan.”
                  </p>
                </div>
                <div>
                  <p class="text-slate-500">Jejak verifikasi</p>
                  <ul class="list-disc pl-4 text-[11px] text-slate-600">
                    <li>Diterima Lurah: 12 Nov 2025</li>
                    <li>Disetujui Camat: 14 Nov 2025</li>
                  </ul>
                </div>
              </div>
            </div>
          </article>

          <!-- Evidence 2: Foto taman -->
          <article
            class="evidence-card rounded-3xl border border-slate-200 bg-white p-4 shadow-soft"
            data-kategori="Kebersihan"
            data-status="approved"
            data-title="penataan taman rt"
            data-type="image"
          >
            <div class="flex flex-wrap items-start justify-between gap-3">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Kebersihan • Indikator 2
                </p>
                <h2 class="text-sm font-semibold text-slate-900">
                  Penataan taman RT
                </h2>
                <p class="text-[11px] text-slate-500">
                  Penanaman bunga, pengecatan pot, dan pembuatan taman kecil di sekitar pos ronda.
                </p>
              </div>
              <div class="text-right text-[11px]">
                <p class="text-slate-500">Tanggal kegiatan</p>
                <p class="font-semibold text-slate-800">05 November 2025</p>
                <p class="text-slate-500">Upload: 05 November 2025 • 18.20</p>
              </div>
            </div>

            <div class="mt-3 grid gap-3 md:grid-cols-[minmax(0,1.4fr)_minmax(0,0.8fr)]">
              <div>
                <div class="aspect-video w-full rounded-2xl border border-slate-200 bg-slate-100 flex items-center justify-center text-[11px] text-slate-400">
                  Foto taman RT (arsip) — placeholder
                </div>
                <p class="mt-1 text-[11px] text-slate-500">
                  Bisa menampilkan beberapa foto sekaligus (slider) di implementasi produksi.
                </p>
              </div>

              <div class="space-y-2 text-[11px]">
                <div>
                  <p class="text-slate-500">Status verifikasi</p>
                  <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 font-medium text-emerald-700">
                    ✅ Disetujui
                  </span>
                </div>
                <div>
                  <p class="text-slate-500">Catatan verifikator</p>
                  <p class="text-slate-700">
                    “Taman sudah rapi dan menambah estetika lingkungan.”
                  </p>
                </div>
                <div>
                  <p class="text-slate-500">Jejak verifikasi</p>
                  <ul class="list-disc pl-4 text-[11px] text-slate-600">
                    <li>Dicek kelurahan: 06 Nov 2025</li>
                    <li>Foto sesuai lokasi geo-tag</li>
                  </ul>
                </div>
              </div>
            </div>
          </article>

          <!-- Evidence 3: Keamanan (foto) -->
          <article
            class="evidence-card rounded-3xl border border-slate-200 bg-white p-4 shadow-soft"
            data-kategori="Keamanan"
            data-status="approved"
            data-title="pemasangan lampu jalan"
            data-type="image"
          >
            <div class="flex flex-wrap items-start justify-between gap-3">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Keamanan • Indikator 1
                </p>
                <h2 class="text-sm font-semibold text-slate-900">
                  Pemasangan lampu jalan lingkungan
                </h2>
                <p class="text-[11px] text-slate-500">
                  Dokumentasi pemasangan dan kondisi lampu jalan di titik-titik rawan gelap.
                </p>
              </div>
              <div class="text-right text-[11px]">
                <p class="text-slate-500">Tanggal kegiatan</p>
                <p class="font-semibold text-slate-800">03 November 2025</p>
                <p class="text-slate-500">Upload: 03 November 2025 • 21.05</p>
              </div>
            </div>

            <div class="mt-3 grid gap-3 md:grid-cols-[minmax(0,1.4fr)_minmax(0,0.8fr)]">
              <div>
                <div class="aspect-video w-full rounded-2xl border border-slate-200 bg-slate-100 flex items-center justify-center text-[11px] text-slate-400">
                  Foto lampu jalan (arsip) — placeholder
                </div>
                <p class="mt-1 text-[11px] text-slate-500">
                  Di lapangan, foto diambil malam hari untuk menunjukkan lampu menyala.
                </p>
              </div>

              <div class="space-y-2 text-[11px]">
                <div>
                  <p class="text-slate-500">Status verifikasi</p>
                  <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 font-medium text-emerald-700">
                    ✅ Disetujui
                  </span>
                </div>
                <div>
                  <p class="text-slate-500">Catatan verifikator</p>
                  <p class="text-slate-700">
                    “Lokasi sudah sesuai usulan, lampu terpasang dan menyala.”
                  </p>
                </div>
                <div>
                  <p class="text-slate-500">Jejak verifikasi</p>
                  <ul class="list-disc pl-4 text-[11px] text-slate-600">
                    <li>Dicek oleh petugas kelurahan: 04 Nov 2025</li>
                    <li>Tidak ada komplain warga</li>
                  </ul>
                </div>
              </div>
            </div>
          </article>

          <!-- Evidence 4: Sosial (PDF) -->
          <article
            class="evidence-card rounded-3xl border border-slate-200 bg-white p-4 shadow-soft"
            data-kategori="Sosial"
            data-status="approved"
            data-title="rekap kegiatan sosial mingguan"
            data-type="pdf"
          >
            <div class="flex flex-wrap items-start justify-between gap-3">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Sosial • Indikator 1
                </p>
                <h2 class="text-sm font-semibold text-slate-900">
                  Rekap kegiatan sosial mingguan
                </h2>
                <p class="text-[11px] text-slate-500">
                  Dokumen PDF berisi rangkuman kegiatan sosial warga (kunjungan sakit, arisan, pengajian, dll).
                </p>
              </div>
              <div class="text-right text-[11px]">
                <p class="text-slate-500">Periode kegiatan</p>
                <p class="font-semibold text-slate-800">Minggu ke-2 November</p>
                <p class="text-slate-500">Upload: 15 November 2025 • 14.30</p>
              </div>
            </div>

            <div class="mt-3 grid gap-3 md:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)]">
              <div class="space-y-2">
                <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                  <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-mabisa-100 text-[11px] font-semibold text-mabisa-700">
                    PDF
                  </div>
                  <div class="text-[11px]">
                    <p class="font-semibold text-slate-800">
                      rekap-kegiatan-sosial-rt01-minggu2-nov2025.pdf
                    </p>
                    <p class="text-slate-500">
                      4 halaman • berisi daftar hadir & dokumentasi ringkas.
                    </p>
                  </div>
                </div>
                <div class="aspect-video w-full rounded-2xl border border-slate-200 bg-slate-100 flex items-center justify-center text-[11px] text-slate-400">
                  Pratinjau PDF (dummy) — di sistem asli bisa pakai &lt;iframe&gt; atau JS PDF viewer
                </div>
              </div>

              <div class="space-y-2 text-[11px]">
                <div>
                  <p class="text-slate-500">Status verifikasi</p>
                  <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 font-medium text-emerald-700">
                    ✅ Disetujui
                  </span>
                </div>
                <div>
                  <p class="text-slate-500">Catatan verifikator</p>
                  <p class="text-slate-700">
                    “Rekap rapi dan format sudah sesuai panduan administrasi sosial.”
                  </p>
                </div>
                <div>
                  <p class="text-slate-500">Jejak verifikasi</p>
                  <ul class="list-disc pl-4 text-[11px] text-slate-600">
                    <li>Dicek oleh staf kecamatan: 17 Nov 2025</li>
                    <li>Disimpan sebagai arsip di SIGAP BRIDA</li>
                  </ul>
                </div>
              </div>
            </div>
          </article>

          <!-- Evidence 5: Administrasi (PDF, revisi/perbaikan) -->
          <article
            class="evidence-card rounded-3xl border border-slate-200 bg-white p-4 shadow-soft"
            data-kategori="Administrasi"
            data-status="revised"
            data-title="laporan administrasi bulanan"
            data-type="pdf"
          >
            <div class="flex flex-wrap items-start justify-between gap-3">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Administrasi • Indikator 1
                </p>
                <h2 class="text-sm font-semibold text-slate-900">
                  Laporan administrasi bulanan
                </h2>
                <p class="text-[11px] text-slate-500">
                  Laporan PDF mengenai mutasi kependudukan (lahir, meninggal, pindah, datang) dan administrasi lainnya.
                </p>
              </div>
              <div class="text-right text-[11px]">
                <p class="text-slate-500">Periode laporan</p>
                <p class="font-semibold text-slate-800">November 2025</p>
                <p class="text-slate-500">
                  Upload awal: 08 Nov 2025 • Revisi: 12 Nov 2025
                </p>
              </div>
            </div>

            <div class="mt-3 grid gap-3 md:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)]">
              <div class="space-y-2">
                <div class="flex items-center gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                  <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-mabisa-100 text-[11px] font-semibold text-mabisa-700">
                    PDF
                  </div>
                  <div class="text-[11px]">
                    <p class="font-semibold text-slate-800">
                      laporan-administrasi-bulanan-rt01-nov2025-revisi.pdf
                    </p>
                    <p class="text-slate-500">
                      6 halaman • versi revisi dengan lampiran lengkap.
                    </p>
                  </div>
                </div>
                <div class="aspect-video w-full rounded-2xl border border-dashed border-amber-200 bg-amber-50/60 flex items-center justify-center text-[11px] text-amber-700">
                  Pratinjau PDF (revisi) — placeholder
                </div>
              </div>

              <div class="space-y-2 text-[11px]">
                <div>
                  <p class="text-slate-500">Status verifikasi akhir</p>
                  <span class="inline-flex items-center gap-1 rounded-full bg-emerald-50 px-2 py-0.5 font-medium text-emerald-700">
                    ✅ Disetujui setelah perbaikan
                  </span>
                </div>
                <div>
                  <p class="text-slate-500">Catatan verifikator</p>
                  <ul class="list-disc pl-4 text-[11px] text-slate-700">
                    <li>
                      Catatan awal: “Beberapa lampiran belum ditandatangani, mohon dilengkapi.”
                    </li>
                    <li>
                      Catatan akhir: “Lampiran sudah lengkap dan sesuai format administrasi.”
                    </li>
                  </ul>
                </div>
                <div>
                  <p class="text-slate-500">Jejak verifikasi</p>
                  <ul class="list-disc pl-4 text-[11px] text-slate-600">
                    <li>Permintaan perbaikan dikirim: 09 Nov 2025</li>
                    <li>Revisi diupload: 12 Nov 2025</li>
                    <li>Disetujui Lurah & Camat: 13 Nov 2025</li>
                  </ul>
                </div>
              </div>
            </div>
          </article>
        </section>
      </main>
@endsection