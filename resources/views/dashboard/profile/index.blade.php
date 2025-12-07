@extends('layouts.dashboard')
@section('content')
         <!-- CONTENT -->
      <main class="mx-auto flex w-full max-w-6xl flex-1 flex-col gap-8 px-4 py-6">
      @php
          use Illuminate\Support\Str;

          $user = $user ?? auth()->user();
          $initials = collect(explode(' ', $user->name))
              ->filter()
              ->take(2)
              ->map(fn ($part) => Str::substr($part, 0, 1))
              ->implode('');
      @endphp

      <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
          <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
              Identitas utama
          </p>

          <div class="mt-3 flex flex-col items-start gap-6 sm:flex-row sm:items-center">

              {{-- FOTO PROFIL --}}
              <div class="relative">
                  @if($user->foto_profil)
                      <img
                          src="{{ asset('storage/'.$user->foto_profil) }}"
                          alt="Foto profil"
                          class="h-20 w-20 rounded-full object-cover shadow-md"
                      >
                  @else
                      <div
                          class="flex h-20 w-20 items-center justify-center rounded-full bg-mabisa-50 text-lg font-semibold text-mabisa-700 shadow-md"
                      >
                          {{ $initials }}
                      </div>
                  @endif

                  {{-- optional: nanti kalau mau dihubungkan ke form/file input --}}
                  {{-- <label ...>✎</label> --}}
              </div>

              {{-- IDENTITAS TEKS --}}
              <div class="space-y-1 text-sm min-w-[200px]">
                  <p class="text-base font-semibold text-slate-900">
                      {{ $user->name }}
                  </p>
                  <p class="text-xs text-slate-600">
                      {{ $user->unit_kerja ?? 'Badan Riset dan Inovasi Daerah Kota Makassar' }}
                  </p>

                  <div class="flex flex-wrap items-center gap-2 text-[11px] text-slate-500">
                      @if($user->jabatan)
                          <span class="rounded-full bg-mabisa-50 px-2.5 py-0.5 font-medium text-mabisa-700">
                              {{ $user->jabatan }}
                          </span>
                      @endif

                      @foreach($user->getRoleNames() as $role)
                          <span class="rounded-full bg-slate-50 px-2.5 py-0.5 font-medium">
                              Peran: {{ ucfirst($role) }}
                          </span>
                      @endforeach
                  </div>
              </div>

              {{-- FOTO RUMAH / KANTOR (LANDSCAPE) --}}
              <div class="relative">
                  @if($user->foto_rumah_kantor)
                      <img
                          src="{{ asset('storage/'.$user->foto_rumah_kantor) }}"
                          alt="Foto rumah/kantor"
                          class="h-24 w-60 rounded-2xl object-cover shadow-md border border-slate-200"
                      >
                  @else
                      <div
                          class="flex h-24 w-60 items-center justify-center rounded-2xl bg-slate-100 text-[10px] text-slate-500 text-center p-2 border border-slate-200"
                      >
                          Belum ada foto rumah/kantor
                      </div>
                  @endif

                  {{-- optional: label edit nanti bisa dihubungkan ke input file di form --}}
                  {{-- <label ...>✎</label> --}}
              </div>
          </div>
      </div>



        <!-- Data diri utama -->
        <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
          <form action="{{ route('dashboard.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Data diri
                </p>
                <p class="text-sm font-semibold text-slate-900">Informasi yang tampil di sistem</p>
              </div>
            </div>

            @if(session('success'))
              <div class="mb-3 rounded-xl bg-emerald-50 px-3 py-2 text-[11px] text-emerald-700">
                {{ session('success') }}
              </div>
            @endif

            @if($errors->any())
              <div class="mb-3 rounded-xl bg-rose-50 px-3 py-2 text-[11px] text-rose-700">
                <ul class="list-disc pl-4">
                  @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
              </div>
            @endif

            <div class="grid gap-3 text-xs sm:grid-cols-2">
              {{-- Nama lengkap (pakai field "name") --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Nama lengkap</label>
                <input
                  type="text"
                  name="name"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('name', $user->name) }}"
                />
              </div>

              {{--NIP--}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">NIP</label>
                <input
                  type="text"
                  name="nip"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('nip', $user->nip) }}"
                />
              </div>
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">NIK</label>
                <input
                  type="text"
                  name="nik"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('nik', $user->nik) }}"
                />
              </div>

              {{-- Unit kerja --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Unit kerja</label>
                <input
                  type="text"
                  name="unit_kerja"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('unit_kerja', $user->unit_kerja ?? 'BRIDA Kota Makassar') }}"
                />
              </div>

              {{-- Jabatan --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Jabatan</label>
                <input
                  type="text"
                  name="jabatan"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('jabatan', $user->jabatan) }}"
                />
              </div>

              {{-- Nomor HP --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">No. HP</label>
                <input
                  type="tel"
                  name="nomor_hp"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('nomor_hp', $user->nomor_hp) }}"
                />
              </div>

              {{-- Alamat kantor --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Alamat kantor</label>
                <input
                  type="text"
                  name="alamat_kantor"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('alamat_kantor', $user->alamat_kantor) }}"
                />
              </div>

              {{-- RT --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">RT</label>
                <input
                  type="text"
                  name="rt"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('rt', $user->rt) }}"
                />
              </div>

              {{-- RW --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">RW</label>
                <input
                  type="text"
                  name="rw"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('rw', $user->rw) }}"
                />
              </div>

              {{-- Kelurahan --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Kelurahan</label>
                <input
                  type="text"
                  name="kelurahan"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('kelurahan', $user->kelurahan) }}"
                />
              </div>

              {{-- Kecamatan --}}
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Kecamatan</label>
                <input
                  type="text"
                  name="kecamatan"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="{{ old('kecamatan', $user->kecamatan) }}"
                />
              </div>

              {{-- Upload foto profil --}}
              <div class="space-y-1.5 sm:col-span-2">
                <label class="block text-[11px] font-medium text-slate-600">Foto profil</label>
                <input
                  type="file"
                  name="foto_profil"
                  accept="image/*"
                  class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                />
                @if($user->foto_profil)
                  <p class="mt-1 text-[11px] text-slate-500">
                    Foto saat ini:
                    <a href="{{ asset('storage/'.$user->foto_profil) }}" target="_blank" class="text-mabisa-600 underline">
                      Lihat
                    </a>
                  </p>
                @endif
              </div>

              {{-- Upload foto rumah/kantor --}}
              <div class="space-y-1.5 sm:col-span-2">
                <label class="block text-[11px] font-medium text-slate-600">Foto rumah/kantor</label>
                <input
                  type="file"
                  name="foto_rumah_kantor"
                  accept="image/*"
                  class="w-full rounded-xl border border-slate-200 bg-white px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                />
                @if($user->foto_rumah_kantor)
                  <p class="mt-1 text-[11px] text-slate-500">
                    Foto saat ini:
                    <a href="{{ asset('storage/'.$user->foto_rumah_kantor) }}" target="_blank" class="text-mabisa-600 underline">
                      Lihat
                    </a>
                  </p>
                @endif
              </div>
            </div>

            <div class="mt-3 flex flex-wrap gap-2 text-[11px]">
              <button
                type="submit"
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1.5 text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
              >
                Simpan data diri
              </button>
              <button
                type="reset"
                class="rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-slate-500 hover:bg-slate-50"
              >
                Batalkan perubahan
              </button>
            </div>
          </form>
        </div>

        </section>

        <!-- SECTION: Akun & peran -->
        <section class="grid gap-6 md:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]">
          <!-- Akun login -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Akun MABISA
                </p>
                <p class="text-sm font-semibold text-slate-900">Email &amp; password</p>
              </div>
            </div>
            <div class="space-y-3 text-xs">
              <div class="space-y-1.5">
                <label class="block text-[11px] font-medium text-slate-600">Email login</label>
                <input
                  type="email"
                  class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                  value="andi.gigatera@makassarkota.go.id"
                />
              </div>
              <div class="grid gap-3 sm:grid-cols-2">
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Password baru</label>
                  <input
                    type="password"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                    placeholder="Kosongkan jika tidak diubah"
                  />
                </div>
                <div class="space-y-1.5">
                  <label class="block text-[11px] font-medium text-slate-600">Ulangi password baru</label>
                  <input
                    type="password"
                    class="w-full rounded-xl border border-slate-200 bg-slate-50 px-3 py-2 text-xs text-slate-800 focus:border-mabisa-300 focus:outline-none focus:ring-1 focus:ring-mabisa-200"
                    placeholder="Ulangi password baru"
                  />
                </div>
              </div>
              <p class="text-[11px] text-slate-500">
                Password minimal 8 karakter, disarankan kombinasi huruf besar-kecil, angka, dan simbol.
              </p>
              <div class="flex flex-wrap gap-2">
                <button
                  class="rounded-xl bg-mabisa-500 px-3.5 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
                >
                  Simpan pengaturan akun
                </button>
                <button
                  class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-[11px] text-slate-600 hover:bg-slate-50"
                >
                  Kirim tautan reset ke email
                </button>
              </div>
            </div>
          </div>

          <!-- Peran & hak akses -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Peran &amp; hak akses
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Apa saja yang bisa dilakukan di MABISA
                </p>
              </div>
              <span class="rounded-full bg-mabisa-50 px-3 py-1 text-[11px] font-medium text-mabisa-700">
                Peran: Admin Kota
              </span>
            </div>
            <div class="grid gap-3 text-xs sm:grid-cols-2">
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="font-semibold text-slate-900">Akses data</p>
                <ul class="mt-1 space-y-0.5 text-slate-700">
                  <li>• Lihat rekap semua kelurahan.</li>
                  <li>• Lihat status insentif seluruh RT/RW.</li>
                  <li>• Akses laporan triwulan &amp; tahunan.</li>
                </ul>
              </div>
              <div class="rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <p class="font-semibold text-slate-900">Hak pengelolaan</p>
                <ul class="mt-1 space-y-0.5 text-slate-700">
                  <li>• Atur periode penilaian.</li>
                  <li>• Kelola indikator kinerja.</li>
                  <li>• Export data untuk SIGAP/SIPD.</li>
                </ul>
              </div>
            </div>
            <p class="mt-3 text-[11px] text-slate-500">
              Perubahan peran &amp; level akses hanya dapat dilakukan oleh super admin/otoritas yang ditunjuk. Jika ada ketidaksesuaian, hubungi
              admin utama SIGAP BRIDA.
            </p>
          </div>
        </section>

        <!-- SECTION: Preferensi & keamanan -->
        <section class="grid gap-6 md:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)]">
          <!-- Notifikasi -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Preferensi notifikasi
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Apa saja yang ingin Anda dapatkan
                </p>
              </div>
            </div>
            <div class="space-y-3 text-xs">
              <label class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <input type="checkbox" class="mt-0.5" checked />
                <div>
                  <p class="font-semibold text-slate-900">Notifikasi email</p>
                  <p class="text-[11px] text-slate-600">
                    Dapatkan ringkasan berkala (mingguan/bulanan) tentang status bukti &amp; insentif.
                  </p>
                </div>
              </label>
              <label class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <input type="checkbox" class="mt-0.5" checked />
                <div>
                  <p class="font-semibold text-slate-900">Notifikasi penting</p>
                  <p class="text-[11px] text-slate-600">
                    Pemberitahuan ketika ada batas waktu pengumpulan bukti atau rekap insentif terbaru.
                  </p>
                </div>
              </label>
              <label class="flex items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <input type="checkbox" class="mt-0.5" />
                <div>
                  <p class="font-semibold text-slate-900">Notifikasi WA (opsional)</p>
                  <p class="text-[11px] text-slate-600">
                    Integrasi dengan nomor WA resmi pemerintah untuk broadcast tertentu (jika diaktifkan).
                  </p>
                </div>
              </label>

              <div class="flex flex-wrap gap-2 pt-1">
                <button
                  class="rounded-xl bg-mabisa-500 px-3.5 py-1.5 text-[11px] font-semibold text-white hover:bg-mabisa-600"
                >
                  Simpan preferensi
                </button>
                <button
                  class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-[11px] text-slate-600 hover:bg-slate-50"
                >
                  Reset ke default
                </button>
              </div>
            </div>
          </div>

          <!-- Aktivitas keamanan -->
          <div class="rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40">
            <div class="mb-3 flex items-center justify-between gap-2">
              <div>
                <p class="text-[11px] font-semibold uppercase tracking-wider text-slate-500">
                  Aktivitas keamanan
                </p>
                <p class="text-sm font-semibold text-slate-900">
                  Login &amp; penggunaan terakhir
                </p>
              </div>
              <button
                class="rounded-xl border border-slate-200 bg-slate-50 px-3 py-1 text-[11px] text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
              >
                Lihat log lengkap
              </button>
            </div>

            <div class="space-y-2 text-[11px]">
              <div class="flex items-start justify-between gap-2 rounded-2xl border border-slate-200 bg-slate-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-slate-900">Login berhasil</p>
                  <p class="text-slate-600">18 November 2025 • 09.41 WITA</p>
                  <p class="text-slate-500">Perangkat: Chrome • Windows 10 • IP 192.168.xx.xx</p>
                </div>
                <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-medium text-emerald-700">
                  Saat ini
                </span>
              </div>
              <div class="flex items-start justify-between gap-2 rounded-2xl border border-slate-200 bg-white px-3 py-2">
                <div>
                  <p class="font-semibold text-slate-900">Login berhasil</p>
                  <p class="text-slate-600">17 November 2025 • 21.13 WITA</p>
                  <p class="text-slate-500">Perangkat: Chrome • Android • IP 192.168.xx.xx</p>
                </div>
              </div>
              <div class="flex items-start justify-between gap-2 rounded-2xl border border-amber-100 bg-amber-50 px-3 py-2">
                <div>
                  <p class="font-semibold text-amber-900">Percobaan login gagal</p>
                  <p class="text-amber-800">16 November 2025 • 22.02 WITA</p>
                  <p class="text-amber-800/80">Password salah 3x dari perangkat yang sama.</p>
                </div>
                <span class="rounded-full bg-white px-2 py-0.5 text-[10px] font-medium text-amber-700">
                  Perlu cek
                </span>
              </div>
            </div>

            <div class="mt-3 flex flex-wrap gap-2 text-[11px]">
              <button
                class="rounded-xl border border-slate-200 bg-white px-3.5 py-1.5 text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60"
              >
                Logout dari semua perangkat
              </button>
              <button
                class="rounded-xl border border-rose-100 bg-rose-50 px-3.5 py-1.5 text-rose-700 hover:border-rose-200"
              >
                Laporkan aktivitas mencurigakan
              </button>
            </div>
          </div>
        </section>

        <!-- Placeholder indikator -->
        <section id="indikator" class="mt-4 rounded-3xl border border-slate-200 bg-white p-4 shadow-soft/40 text-xs">
          <p class="mb-1 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Indikator manajemen (placeholder)
          </p>
          <p class="text-slate-600">
            Halaman penuh untuk mengatur indikator kinerja RT/RW (bobot, skala, dan cara perhitungan skor) akan ditempatkan di sini. Untuk
            sementara, Anda bisa fokus menyelesaikan halaman profil dan dashboard.
          </p>
        </section>
      </main>
@endsection