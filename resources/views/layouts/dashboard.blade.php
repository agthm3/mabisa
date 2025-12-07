<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard MABISA — Makassar Bukti & Insentif Satu Aplikasi </title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta
    name="description"
    content="Dashboard MABISA — ringkasan kinerja RT/RW, status verifikasi, dan kelayakan insentif."
  />
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            mabisa: {
              50: '#fdf5f5',
              100: '#fae5e6',
              200: '#f3c7ca',
              300: '#e89aa0',
              400: '#d86872',
              500: '#b1333f',  // maroon utama
              600: '#8f2633',
              700: '#6e1d28',
              800: '#4a151d',
              900: '#2e0e14',
            },
          },
          boxShadow: {
            soft: '0 18px 45px rgba(15,23,42,0.08)',
          },
          borderRadius: {
            '3xl': '1.75rem',
          },
        },
      },
    };
  </script>
  <!-- Chart.js untuk grafik sederhana -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-slate-50 text-slate-900">
  <!-- Background lembut -->
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-32 -right-16 h-72 w-72 rounded-full bg-mabisa-100 opacity-70 blur-3xl"></div>
    <div class="absolute -bottom-32 -left-20 h-80 w-80 rounded-full bg-mabisa-50 opacity-80 blur-3xl"></div>
  </div>

  <div class="flex min-h-screen">
    <!-- SIDEBAR -->
    <aside
      id="sidebar"
      class="fixed inset-y-0 left-0 z-30 flex w-64 flex-col border-r border-slate-200 bg-white px-4 py-4 shadow-soft transition-transform duration-200 md:static md:translate-x-0"
    >
      <!-- Logo + close (mobile) -->
      <div class="mb-6 flex items-center justify-between gap-2">
        <div class="flex items-center gap-3">
          <div class="flex h-9 w-9 items-center justify-center rounded-2xl bg-mabisa-500 text-white shadow-soft">
            <span class="text-xs font-semibold tracking-tight">MB</span>
          </div>
          <div class="leading-tight">
            <p class="text-sm font-semibold tracking-tight text-slate-900">MABISA</p>
            <p class="text-[11px] text-slate-500">Makassar Bukti &amp; Insentif</p>
          </div>
        </div>
        <button
          id="sidebar-close"
          class="rounded-lg border border-slate-200 bg-slate-50 p-1 text-slate-600 md:hidden"
        >
          ✕
        </button>
      </div>

      <!-- Info user singkat -->
      <div class="mb-4 rounded-2xl border border-slate-200 bg-slate-50 p-3 text-xs">
        <div class="flex items-center gap-3">
          <div class="flex h-9 w-9 items-center justify-center rounded-full bg-mabisa-50 text-mabisa-700 text-xs font-semibold">
            AG
          </div>
        <div class="flex-1">
            <p class="text-[13px] font-semibold text-slate-900">Andi Gigatera</p>
            <p class="text-[11px] text-slate-500">Admin Kota • BRIDA Makassar</p>
          </div>
        </div>
        <div class="mt-2 flex items-center justify-between text-[11px] text-slate-500">
          <span>Login sebagai: Admin</span>
          <span class="rounded-full bg-emerald-50 px-2 py-0.5 text-[10px] font-medium text-emerald-600">
            Online
          </span>
        </div>
      </div>

      <!-- MENU UTAMA -->
      <nav class="flex-1 space-y-5 text-sm">
        <div>
          <p class="mb-1 px-2 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Navigasi
          </p>
          <ul class="space-y-1">
            <li>
              <a
                href="{{ route("dashboard.home.index") }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>📊</span>
                <span>Dashboard Utama</span>
              </a>
            </li>
            <li>
              <a
                href="{{ route('dashboard.profile.index') }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>👤</span>
                <span>Profil</span>
              </a>
            </li>
            <li>
              <a
                href="{{ route("dashboard.indikator.index") }}"
                class="flex items-center gap-2 rounded-xl bg-mabisa-50 px-3 py-2 font-medium text-mabisa-700"
              >
                <span>📌</span>
                <span>Indikator Manajemen</span>
              </a>
            </li>
          </ul>
        </div>

        <div>
          <p class="mb-1 px-2 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Pengguna &amp; peran
          </p>
          <ul class="space-y-1">
            <li>
              <a
                href="{{ route('dashboard.user.index') }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>👥</span>
                <span>Semua User</span>
              </a>
            </li>
            <li>
              <a
                href="{{ route('dashboard.verification.index') }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>🧾</span>
                <span>Panel Verifikator</span>
              </a>
            </li>
          </ul>
        </div>

        <div>
          <p class="mb-1 px-2 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Operasional
          </p>
          <ul class="space-y-1">
            <li>
              <a
                href="{{ route('dashboard.evidence.index') }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>📷</span>
                <span>Bukti RT/RW</span>
              </a>
            </li>
            <li>
              <a
                href="{{ route('dashboard.insentive.index') }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>✅</span>
                <span>History Insentif</span>
              </a>
            </li>
            <li>
              <a
                href="{{ route('dashboard.history.verification.index') }}"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>🧾</span>
                <span>History Verification</span>
              </a>
            </li>
            <li>
              <a
                href="#"
                class="flex items-center gap-2 rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span>🕒</span>
                <span>Log Aktivitas</span>
                <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[10px] text-mabisa-700">Not Available</span>
              </a>
            </li>

          </ul>
        </div>

        <div>
          <p class="mb-1 px-2 text-[11px] font-semibold uppercase tracking-wider text-slate-500">
            Sistem
          </p>
          <ul class="space-y-1">
            <li>
              <a
                href="#"
                class="flex items-center justify-between rounded-xl px-3 py-2 text-slate-600 hover:bg-slate-50 hover:text-slate-900"
              >
                <span class="flex items-center gap-2">
                  <span>⚙️</span>
                  <span>Pengaturan Sistem</span>
                </span>
                <span class="rounded-full bg-mabisa-50 px-2 py-0.5 text-[10px] text-mabisa-700">Admin</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <!-- Footer sidebar -->
      <div class="mt-4 border-t border-slate-200 pt-3 text-[11px] text-slate-500">
        <p>Bagian dari ekosistem <span class="font-semibold text-slate-800">SIGAP BRIDA</span>.</p>
        <button
          class="mt-2 inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-slate-50 px-2.5 py-1 text-[11px] text-slate-700"
        >
          ↪ Kembali ke SIGAP
        </button>
      </div>
    </aside>


    <!-- MAIN AREA -->
    <div class="flex flex-1 flex-col md:ml-0 md:pl-0 md:pr-0">
      <!-- TOP BAR -->
      <header class="sticky top-0 z-20 border-b border-slate-200 bg-white/80 backdrop-blur-md">
        <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-3">
          <div>
            <p class="text-xs font-medium uppercase tracking-wider text-slate-500">
              Dashboard MABISA
            </p>
            <h1 class="text-lg font-semibold text-slate-900">
              Ringkasan kinerja RT/RW &amp; status insentif
            </h1>
          </div>
          <div class="flex items-center gap-2">
            <!-- Tombol filter periode (dummy) -->
            <button
              class="hidden items-center gap-1 rounded-xl border border-slate-200 bg-white px-3 py-1.5 text-xs text-slate-700 hover:border-mabisa-200 hover:bg-mabisa-50/60 md:inline-flex"
            >
              📅 Periode: <span class="font-medium">Triwulan I</span>
            </button>
            <!-- Tombol sidebar (mobile) -->
            <button
              id="sidebar-open"
              class="inline-flex items-center rounded-lg border border-slate-200 bg-white p-1.5 text-slate-700 md:hidden"
            >
              ☰
            </button>
          </div>
        </div>
      </header>

        @yield('content')
    </div>
  </div>

  <!-- JS --> 
  @stack('script')
  <script>
    // Sidebar toggle (mobile)
    const sidebar = document.getElementById('sidebar');
    const sidebarOpen = document.getElementById('sidebar-open');
    const sidebarClose = document.getElementById('sidebar-close');

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

    // Pada mobile awalnya hidden
    if (window.innerWidth < 768) {
      sidebar.classList.add('-translate-x-full');
    }

    // Charts (dummy data)
    document.addEventListener('DOMContentLoaded', () => {
      const buktiCtx = document.getElementById('chartBukti');
      const statusCtx = document.getElementById('chartStatus');
      const insentifCtx = document.getElementById('chartInsentif');

      if (buktiCtx) {
        new Chart(buktiCtx, {
          type: 'line',
          data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu'],
            datasets: [
              {
                label: 'Bukti',
                data: [210, 260, 310, 290, 340, 380, 410, 482],
                borderColor: '#b1333f',
                backgroundColor: 'rgba(177,51,63,0.08)',
                tension: 0.35,
                fill: true,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                display: false,
              },
            },
            scales: {
              x: {
                grid: { display: false },
                ticks: { font: { size: 11 } },
              },
              y: {
                grid: { color: 'rgba(148,163,184,0.25)' },
                ticks: { font: { size: 11 }, beginAtZero: true },
              },
            },
          },
        });
      }

      if (statusCtx) {
        new Chart(statusCtx, {
          type: 'bar',
          data: {
            labels: ['Menunggu', 'Diterima', 'Ditolak'],
            datasets: [
              {
                data: [62, 390, 30],
                backgroundColor: ['#eab308', '#22c55e', '#ef4444'],
                borderRadius: 6,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: { display: false },
            },
            scales: {
              x: {
                grid: { display: false },
                ticks: { font: { size: 11 } },
              },
              y: {
                grid: { color: 'rgba(148,163,184,0.25)' },
                ticks: { font: { size: 11 }, beginAtZero: true },
              },
            },
          },
        });
      }

      if (insentifCtx) {
        new Chart(insentifCtx, {
          type: 'doughnut',
          data: {
            labels: ['Layak', 'Dipantau', 'Tidak layak'],
            datasets: [
              {
                data: [87, 9, 4],
                backgroundColor: ['#22c55e', '#eab308', '#ef4444'],
                borderWidth: 0,
              },
            ],
          },
          options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '70%',
            plugins: {
              legend: { display: false },
            },
          },
        });
      }
    });
  </script>


</body>
</html>
