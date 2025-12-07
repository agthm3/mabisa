@extends('layouts.dashboard')

@section('content')
      <!-- Content -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Ringkasan riwayat -->
        <section class="grid gap-4 md:grid-cols-3">
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Total bulan terekam
            </p>
            <p class="mt-2 text-2xl font-semibold text-slate-900">12</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Riwayat 12 bulan terakhir tersimpan di MABISA.
            </p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Bulan lengkap disetujui
            </p>
            <p class="mt-2 text-2xl font-semibold text-emerald-600">7</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Semua indikator dinyatakan sah oleh verifikator.
            </p>
          </div>
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Bulan perlu perhatian
            </p>
            <p class="mt-2 text-2xl font-semibold text-amber-600">3</p>
            <p class="mt-1 text-[11px] text-slate-500">
              Terdapat bukti yang ditolak atau diminta perbaikan.
            </p>
          </div>
        </section>

        <!-- Filter tahun & status -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="flex flex-wrap items-center justify-between gap-3 text-[11px]">
            <div class="space-y-1">
              <p class="font-semibold uppercase tracking-wider text-slate-500">
                Filter riwayat
              </p>
              <p class="text-slate-600">
                Pilih tahun atau status untuk melihat riwayat tertentu.
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
                  id="searchPeriode"
                  type="text"
                  class="w-36 rounded-xl border border-slate-200 bg-slate-50 pl-6 pr-2 py-1.5 text-[11px] text-slate-700 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  placeholder="Cari bulan..."
                />
              </div>
            </div>
          </div>
        </section>

        <!-- Tabel riwayat per bulan -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="mb-3 flex items-center justify-between gap-2">
            <div>
              <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Riwayat bulanan
              </p>
              <p class="text-sm font-semibold text-slate-900">
                Rekap bukti per bulan
              </p>
            </div>
            <button
              class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
            >
              ⬇ Unduh rekap (PDF)
            </button>
          </div>

          <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full border-collapse text-xs">
              <thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">
                <tr>
                  <th class="px-3 py-2 text-left">Periode</th>
                  <th class="px-3 py-2 text-left">Status pengiriman</th>
                  <th class="px-3 py-2 text-left">Ringkasan bukti</th>
                  <th class="px-3 py-2 text-left">Status insentif</th>
                  <th class="px-3 py-2 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="historyBody" class="divide-y divide-slate-100">
                <!-- Contoh data, bisa nanti diganti  -->
                <tr
                  data-tahun="2025"
                  data-status="waiting"
                  data-periode="November 2025"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">November 2025</p>
                    <p class="text-[11px] text-slate-500">
                      Periode berjalan • Batas kirim: 25 Nov 2025
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-amber-50 px-2 py-0.5 text-[11px] font-medium text-amber-700">
                      Menunggu verifikasi
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Terkirim ke Lurah pada 24 Nov 2025
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
                      href="{{ route('dashboard.insentive.show') }}"
                      class="inline-flex items-center gap-1 rounded-full bg-mabisa-500 px-3 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
                    >
                      👁 Lihat
                    </a>
                  </td>
                </tr>

                <tr
                  data-tahun="2025"
                  data-status="approved"
                  data-periode="Oktober 2025"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Oktober 2025</p>
                    <p class="text-[11px] text-slate-500">
                      Periode lampau
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Lengkap disetujui
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Diverifikasi penuh oleh Lurah & Camat
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

                <tr
                  data-tahun="2025"
                  data-status="issue"
                  data-periode="September 2025"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">September 2025</p>
                    <p class="text-[11px] text-slate-500">
                      Periode lampau
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-rose-50 px-2 py-0.5 text-[11px] font-medium text-rose-700">
                      Perlu perbaikan
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      1 indikator diminta perbaikan bukti
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

                <tr
                  data-tahun="2025"
                  data-status="partial"
                  data-periode="Agustus 2025"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Agustus 2025</p>
                    <p class="text-[11px] text-slate-500">
                      Periode lampau
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

                <tr
                  data-tahun="2024"
                  data-status="approved"
                  data-periode="Desember 2024"
                >
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">Desember 2024</p>
                    <p class="text-[11px] text-slate-500">
                      Tahun sebelumnya
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[11px] font-medium text-emerald-700">
                      Lengkap disetujui
                    </span>
                    <p class="mt-1 text-[11px] text-slate-500">
                      Semua bukti tervalidasi
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

                <!-- Bisa ditambah baris lain untuk 12 bulan dst -->
              </tbody>
            </table>
          </div>

          <p class="mt-3 text-[11px] text-slate-500">
            Tombol <strong>“Lihat”</strong> dapat diarahkan ke halaman detail riwayat, misalnya
            <code>/rt/history/2025/11</code> untuk melihat semua evidence bulan tersebut.
          </p>
        </section>
      </main>
@endsection

@push('script')
    <script>
          // Filter riwayat
    var filterTahun = document.getElementById('filterTahun');
    var filterStatus = document.getElementById('filterStatus');
    var searchPeriode = document.getElementById('searchPeriode');
    var historyRows = document.querySelectorAll('#historyBody tr');

    function applyHistoryFilter() {
      var tahun = filterTahun.value;
      var status = filterStatus.value;
      var q = (searchPeriode.value || '').toLowerCase();

      historyRows.forEach(function (row) {
        var rowTahun = row.getAttribute('data-tahun');
        var rowStatus = row.getAttribute('data-status');
        var periode = (row.getAttribute('data-periode') || '').toLowerCase();

        var visible = true;

        if (tahun !== 'all' && rowTahun !== tahun) visible = false;
        if (status !== 'all' && rowStatus !== status) visible = false;
        if (q && !periode.includes(q)) visible = false;

        row.classList.toggle('hidden', !visible);
      });
    }

    filterTahun.addEventListener('change', applyHistoryFilter);
    filterStatus.addEventListener('change', applyHistoryFilter);
    searchPeriode.addEventListener('input', applyHistoryFilter);

    // Inisialisasi filter (supaya yang 2025 langsung kelihatan utama)
    applyHistoryFilter();
    </script>
@endpush