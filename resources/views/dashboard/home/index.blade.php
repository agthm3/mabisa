@extends('layouts.dashboard')

@section('content')
      <!-- CONTENT -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan angka kunci -->
        <section class="grid gap-4 md:grid-cols-4">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Bukti bulan ini
            </p>
            <p class="mt-2 text-2xl font-semibold text-mabisa-600">482</p>
            <p class="mt-1 text-[11px] text-emerald-600">+32% dari bulan lalu</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Menunggu verifikasi
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">62</p>
            <p class="mt-1 text-[11px] text-slate-500">Perlu perhatian lurah/camat</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              RT/RW layak insentif
            </p>
            <p class="mt-2 text-2xl font-semibold text-emerald-600">87%</p>
            <p class="mt-1 text-[11px] text-slate-500">Berdasarkan skor kinerja</p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Rekap terakhir
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">12 Mar</p>
            <p class="mt-1 text-[11px] text-slate-500">Oleh Admin Kota</p>
          </div>
        </section>

        <!-- Grafik utama -->
        <section class="grid gap-6 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)]">
          <!-- Line chart -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                  Tren bukti RT/RW
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Jumlah bukti per bulan
                </p>
              </div>
              <select
                class="rounded-xl border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
              >
                <option>1 tahun terakhir</option>
                <option>6 bulan terakhir</option>
                <option>3 bulan terakhir</option>
              </select>
            </div>
            <div class="h-56">
              <canvas id="chartBukti"></canvas>
            </div>
          </div>

          <!-- Bar + donut kecil -->
          <div class="space-y-4">
            <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
              <div class="mb-3 flex items-center justify-between gap-2">
                <div>
                  <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Status verifikasi
                  </p>
                  <p class="text-sm font-semibold text-slate-900">Distribusi bukti</p>
                </div>
              </div>
              <div class="h-40">
                <canvas id="chartStatus"></canvas>
              </div>
            </div>

            <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
              <div class="mb-3 flex items-center justify-between gap-2">
                <div>
                  <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Kelayakan insentif
                  </p>
                  <p class="text-sm font-semibold text-slate-900">RT/RW per kategori</p>
                </div>
              </div>
              <div class="flex items-center gap-4">
                <div class="h-28 w-28">
                  <canvas id="chartInsentif"></canvas>
                </div>
                <ul class="flex-1 space-y-1 text-[11px] text-slate-700">
                  <li class="flex items-center justify-between">
                    <span class="flex items-center gap-1">
                      <span class="inline-block h-2 w-2 rounded-full bg-emerald-500"></span>
                      Layak
                    </span>
                    <span class="font-semibold">87%</span>
                  </li>
                  <li class="flex items-center justify-between">
                    <span class="flex items-center gap-1">
                      <span class="inline-block h-2 w-2 rounded-full bg-amber-400"></span>
                      Dipantau
                    </span>
                    <span class="font-semibold">9%</span>
                  </li>
                  <li class="flex items-center justify-between">
                    <span class="flex items-center gap-1">
                      <span class="inline-block h-2 w-2 rounded-full bg-rose-500"></span>
                      Tidak layak
                    </span>
                    <span class="font-semibold">4%</span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </section>

        <!-- Status singkat & indikator -->
        <section class="grid gap-6 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]">
          <!-- Daftar status -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                  Status singkat
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Hal yang perlu dipantau
                </p>
              </div>
              <button
                class="hidden rounded-xl border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] text-slate-700 md:inline-block"
              >
                Lihat detail →
              </button>
            </div>
            <div class="space-y-2 text-xs">
              <div class="flex items-start justify-between gap-2 rounded-2xl border border-amber-100 bg-amber-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-amber-800">
                    12 RT/RW belum upload bukti untuk bulan berjalan
                  </p>
                  <p class="mt-0.5 text-amber-800/80">
                    Sebaran di 3 kelurahan. Bisa dikirim pengingat melalui notifikasi.
                  </p>
                </div>
                <span class="rounded-full bg-white px-2 py-0.5 text-[10px] font-medium text-amber-700">
                  Prioritas
                </span>
              </div>
              <div class="flex items-start justify-between gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-slate-900">
                    62 bukti menunggu verifikasi lebih dari 3 hari
                  </p>
                  <p class="mt-0.5 text-slate-600">
                    Lurah &amp; camat dapat melihat daftar ini di menu Verifikasi &amp; Insentif.
                  </p>
                </div>
                <span class="rounded-full bg-white px-2 py-0.5 text-[10px] font-medium text-slate-600">
                  Pending
                </span>
              </div>
              <div class="flex items-start justify-between gap-2 rounded-2xl border border-emerald-100 bg-emerald-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-emerald-800">
                    87% RT/RW masuk kategori layak insentif
                  </p>
                  <p class="mt-0.5 text-emerald-800/80">
                    Data ini otomatis masuk rekap insentif bulanan.
                  </p>
                </div>
                <span class="rounded-full bg-white px-2 py-0.5 text-[10px] font-medium text-emerald-700">
                  Baik
                </span>
              </div>
            </div>
          </div>

          <!-- Indikator manajemen (preview) -->
          <div id="indikator" class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                  Indikator manajemen
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Ringkasan indikator utama
                </p>
              </div>
              <button
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
              >
                Atur indikator
              </button>
            </div>
            <div class="space-y-3 text-xs">
              <div class="flex items-center justify-between rounded-2xl border border-slate-100 bg-slate-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-slate-900">Kepatuhan upload bukti</p>
                  <p class="text-[11px] text-slate-600">Persentase RT/RW yang rutin upload tiap bulan.</p>
                </div>
                <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-semibold text-emerald-700">
                  91%
                </span>
              </div>
              <div class="flex items-center justify-between rounded-2xl border border-slate-100 bg-slate-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-slate-900">Rata-rata waktu verifikasi</p>
                  <p class="text-[11px] text-slate-600">Dari upload sampai status diterima/ditolak.</p>
                </div>
                <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[11px] font-semibold text-mabisa-700">
                  2,3 hari
                </span>
              </div>
              <div class="flex items-center justify-between rounded-2xl border border-slate-100 bg-slate-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-slate-900">Konflik data / koreksi</p>
                  <p class="text-[11px] text-slate-600">Bukti yang perlu diunggah ulang atau dikoreksi.</p>
                </div>
                <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[11px] font-semibold text-amber-700">
                  6%
                </span>
              </div>
            </div>
          </div>
        </section>

        <!-- Seksi Profil (placeholder, biar link sidebar ada tujuannya) -->
        <section id="profil" class="mt-4 rounded-3xl border border-slate-200 bg-white p-4 shadow-soft text-xs">
          <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Profil (placeholder)
          </p>
          <p class="text-slate-600">
            Halaman pengaturan profil user (nama, jabatan, unit, foto, password) akan ditempatkan di sini. Untuk sekarang, dashboard hanya
            menampilkan ringkasan grafik &amp; status.
          </p>
        </section>
      </main>
@endsection