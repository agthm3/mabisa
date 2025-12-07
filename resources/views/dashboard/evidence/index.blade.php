@extends('layouts.dashboard')
@section('content')
         <!-- Content -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
        <!-- Profil lokasi & foto -->
        <section class="grid gap-4 md:grid-cols-[minmax(0,1.3fr)_minmax(0,0.9fr)]">
          <!-- Foto rumah/kantor + RT -->
          <div class="space-y-3">
            <!-- Foto kantor/rumah RT -->
            <div class="rounded-3xl border border-slate-200 bg-white p-3 shadow-soft/40">
              <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                Lokasi RT/RW
              </p>
              <div class="mt-2 flex flex-col gap-3 sm:flex-row">
                <div class="flex-1">
                  <div class="aspect-video w-full rounded-2xl border border-slate-200 bg-slate-100 flex items-center justify-center text-[11px] text-slate-400">
                    Foto rumah/kantor RT (dummy)
                  </div>
                  <p class="mt-1 text-[11px] text-slate-500">
                    Nanti bisa diisi foto asli rumah/kantor RT dari upload profil.
                  </p>
                </div>
                <div class="flex w-full flex-col items-center justify-center gap-2 sm:w-32">
                  <div class="flex h-20 w-20 items-center justify-center rounded-full border-2 border-mabisa-200 bg-slate-100 text-[11px] font-semibold text-slate-500">
                    Foto RT
                  </div>
                  <p class="text-[11px] font-semibold text-slate-900 text-center">
                    Pak Ahmad
                  </p>
                  <p class="text-[11px] text-slate-500 text-center">
                    Ketua RT 01 / RW 05
                  </p>
                </div>
              </div>
            </div>
          </div>

          <!-- Detail alamat -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
            <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Detail alamat & wilayah
            </p>
            <div class="mt-2 space-y-1.5">
              <p class="text-slate-700">
                <span class="font-semibold">Alamat:</span>
                Jl. Contoh Lorong 5, No. 10, RT 01 / RW 05
              </p>
              <p class="text-slate-700">
                <span class="font-semibold">Kelurahan:</span> Panakkukang
              </p>
              <p class="text-slate-700">
                <span class="font-semibold">Kecamatan:</span> Panakkukang
              </p>
              <p class="text-slate-700">
                <span class="font-semibold">Kota:</span> Makassar
              </p>
            </div>
            <div class="mt-3 grid gap-2 text-[11px] sm:grid-cols-2">
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="font-semibold text-slate-800">Periode aktif</p>
                <p class="text-slate-600">November 2025</p>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="font-semibold text-slate-800">Batas upload</p>
                <p class="text-slate-600">Setiap tanggal 25</p>
              </div>
            </div>
          </div>
        </section>

        <!-- Filter periode -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="flex flex-wrap items-center justify-between gap-3 text-[11px]">
            <div class="space-y-1">
              <p class="font-semibold uppercase tracking-wider text-slate-500">
                Periode bukti
              </p>
              <p class="text-slate-600">
                Pilih bulan & tahun bukti yang ingin Anda unggah.
              </p>
            </div>
            <div class="flex flex-wrap items-center gap-2">
              <select
                id="bulanSelect"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option>November</option>
                <option>Oktober</option>
                <option>September</option>
              </select>
              <select
                id="tahunSelect"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-[11px] text-slate-700"
              >
                <option>2025</option>
                <option>2024</option>
              </select>
              <button
                class="rounded-xl bg-mabisa-500 px-3 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
              >
                Terapkan
              </button>
            </div>
          </div>
        </section>

        <!-- Tabel indikator -->
        <section class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft">
          <div class="mb-3 flex items-center justify-between gap-2">
            <div>
              <p class="text-xs font-semibold uppercase tracking-wider text-slate-500">
                Indikator kinerja RT/RW
              </p>
              <p class="text-sm font-semibold text-slate-900">
                Unggah bukti untuk setiap indikator di bawah
              </p>
            </div>
            <p class="text-[11px] text-slate-500 max-w-xs text-right">
              Tombol 📷 untuk <strong>buka kamera</strong> (di HP), tombol ⬆ untuk pilih file (foto/PDF) dari galeri.
            </p>
          </div>

          <div class="overflow-hidden rounded-2xl border border-slate-200">
            <table class="min-w-full border-collapse text-xs">
              <thead class="bg-slate-50 text-[11px] uppercase tracking-wide text-slate-500">
                <tr>
                  <th class="px-3 py-2 text-left">Indikator</th>
                  <th class="px-3 py-2 text-left">Frekuensi</th>
                  <th class="px-3 py-2 text-left">Status bukti</th>
                  <th class="px-3 py-2 text-left">Terakhir unggah</th>
                  <th class="px-3 py-2 text-center">Aksi</th>
                </tr>
              </thead>
              <tbody id="indikatorBody" class="divide-y divide-slate-100">
                <!-- Row 1 -->
                <tr data-indicator-row>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      Kerja bakti kebersihan lingkungan
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Dokumentasi kerja bakti membersihkan jalan, drainase, dan area umum.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Minimal 1x / bulan</p>
                    <p class="text-[11px] text-slate-500">Upload: foto kegiatan</p>
                  </td>
                  <td class="px-3 py-2 align-top status-cell">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-500">
                      Belum ada unggahan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top last-upload text-[11px] text-slate-500">
                    —
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <div class="flex items-center justify-center gap-2">
                      <!-- Kamera -->
                      <button
                        type="button"
                        class="btn-camera inline-flex items-center justify-center rounded-full border border-slate-200 bg-slate-50 p-2 text-[13px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                        title="Buka kamera"
                      >
                        📷
                      </button>
                      <!-- Upload file -->
                      <button
                        type="button"
                        class="btn-upload inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
                      >
                        ⬆ <span>Upload</span>
                      </button>

                      <!-- input kamera (image only) -->
                      <input
                        type="file"
                        accept="image/*"
                        capture="environment"
                        class="camera-input hidden"
                      />
                      <!-- input file umum -->
                      <input
                        type="file"
                        accept="image/*,application/pdf"
                        class="file-input hidden"
                      />
                    </div>
                  </td>
                </tr>

                <!-- Row 2 -->
                <tr data-indicator-row>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      Ronda malam / kegiatan keamanan lingkungan
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Dokumentasi ronda malam atau kegiatan koordinasi keamanan.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Minimal 2x / bulan</p>
                    <p class="text-[11px] text-slate-500">Upload: foto kegiatan / daftar hadir</p>
                  </td>
                  <td class="px-3 py-2 align-top status-cell">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-500">
                      Belum ada unggahan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top last-upload text-[11px] text-slate-500">
                    —
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <div class="flex items-center justify-center gap-2">
                      <button type="button" class="btn-camera inline-flex items-center justify-center rounded-full border border-slate-200 bg-slate-50 p-2 text-[13px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60" title="Buka kamera">
                        📷
                      </button>
                      <button type="button" class="btn-upload inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60">
                        ⬆ <span>Upload</span>
                      </button>
                      <input type="file" accept="image/*" capture="environment" class="camera-input hidden" />
                      <input type="file" accept="image/*,application/pdf" class="file-input hidden" />
                    </div>
                  </td>
                </tr>

                <!-- Row 3 -->
                <tr data-indicator-row>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      Kegiatan sosial / gotong royong warga
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Contoh: arisan, bantuan warga sakit, kegiatan keagamaan, dll.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">Minimal 1x / bulan</p>
                    <p class="text-[11px] text-slate-500">Upload: foto &/atau rekap PDF</p>
                  </td>
                  <td class="px-3 py-2 align-top status-cell">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-500">
                      Belum ada unggahan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top last-upload text-[11px] text-slate-500">
                    —
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <div class="flex items-center justify-center gap-2">
                      <button type="button" class="btn-camera inline-flex items-center justify-center rounded-full border border-slate-200 bg-slate-50 p-2 text-[13px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60" title="Buka kamera">
                        📷
                      </button>
                      <button type="button" class="btn-upload inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60">
                        ⬆ <span>Upload</span>
                      </button>
                      <input type="file" accept="image/*" capture="environment" class="camera-input hidden" />
                      <input type="file" accept="image/*,application/pdf" class="file-input hidden" />
                    </div>
                  </td>
                </tr>

                <!-- Row 4: Administrasi -->
                <tr data-indicator-row>
                  <td class="px-3 py-2 align-top">
                    <p class="font-semibold text-slate-900">
                      Administrasi & laporan bulanan
                    </p>
                    <p class="text-[11px] text-slate-500">
                      Rekap administrasi warga (pindah datang, meninggal, dll) dalam bentuk PDF.
                    </p>
                  </td>
                  <td class="px-3 py-2 align-top">
                    <p class="text-[11px] text-slate-700">1x / bulan</p>
                    <p class="text-[11px] text-slate-500">Upload: dokumen PDF</p>
                  </td>
                  <td class="px-3 py-2 align-top status-cell">
                    <span class="rounded-full bg-slate-50 px-2 py-0.5 text-[11px] text-slate-500">
                      Belum ada unggahan
                    </span>
                  </td>
                  <td class="px-3 py-2 align-top last-upload text-[11px] text-slate-500">
                    —
                  </td>
                  <td class="px-3 py-2 align-top text-center">
                    <div class="flex items-center justify-center gap-2">
                      <button type="button" class="btn-camera inline-flex items-center justify-center rounded-full border border-slate-200 bg-slate-50 p-2 text-[13px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60" title="Buka kamera">
                        📷
                      </button>
                      <button type="button" class="btn-upload inline-flex items-center gap-1 rounded-full border border-slate-200 bg-white px-3 py-1.5 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60">
                        ⬆ <span>Upload</span>
                      </button>
                      <input type="file" accept="image/*" capture="environment" class="camera-input hidden" />
                      <input type="file" accept="image/*,application/pdf" class="file-input hidden" />
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <p class="mt-3 text-[11px] text-slate-500">
            Setelah semua bukti diunggah, nantinya akan ada tombol <strong>"Kirim bukti bulan ini"</strong> untuk mengirim ke Lurah/Camat melalui MABISA.
          </p>
        </section>
      </main>
@endsection

@push('script')
    <script>
        // Logika tombol kamera & upload per indikator
    const rows = document.querySelectorAll('[data-indicator-row]');

    rows.forEach((row) => {
      const btnCamera = row.querySelector('.btn-camera');
      const btnUpload = row.querySelector('.btn-upload');
      const cameraInput = row.querySelector('.camera-input');
      const fileInput = row.querySelector('.file-input');
      const statusCell = row.querySelector('.status-cell');
      const lastUploadCell = row.querySelector('.last-upload');

      function updateStatus(file, source) {
        if (!file) return;
        const isPdf = file.type === 'application/pdf';

        statusCell.innerHTML = `
          <span class="rounded-full ${isPdf ? 'bg-sky-50 text-sky-700' : 'bg-emerald-50 text-emerald-700'} px-2 py-0.5 text-[11px] font-medium">
            1 file siap dikirim (${isPdf ? 'PDF' : 'Gambar'})
          </span>
        `;
        lastUploadCell.textContent = file.name + ' • dari ' + source;
      }

      if (btnCamera && cameraInput) {
        btnCamera.addEventListener('click', () => {
          cameraInput.click();
        });

        cameraInput.addEventListener('change', () => {
          const file = cameraInput.files[0];
          if (file) {
            updateStatus(file, 'kamera');
            // Di Laravel: kirim via FormData / AJAX atau simpan sementara sebelum "kirim"
            // alert('File dari kamera siap diupload: ' + file.name);
          }
        });
      }

      if (btnUpload && fileInput) {
        btnUpload.addEventListener('click', () => {
          fileInput.click();
        });

        fileInput.addEventListener('change', () => {
          const file = fileInput.files[0];
          if (file) {
            updateStatus(file, 'galeri/berkas');
            // alert('File dari galeri/berkas siap diupload: ' + file.name);
          }
        });
      }
    });
    </script>
@endpush