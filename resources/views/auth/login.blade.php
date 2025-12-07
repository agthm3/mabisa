<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Login — MABISA</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
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
              500: '#b1333f',
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
</head>

<body class="bg-slate-50 min-h-screen flex items-center justify-center px-4">

  <!-- Background decorative -->
  <div class="pointer-events-none fixed inset-0 -z-10">
    <div class="absolute -top-40 -right-20 h-72 w-72 rounded-full bg-mabisa-100 opacity-70 blur-3xl"></div>
    <div class="absolute -bottom-40 -left-24 h-80 w-80 rounded-full bg-mabisa-50 opacity-80 blur-3xl"></div>
  </div>

  <!-- Login card -->
  <div class="w-full max-w-md rounded-3xl bg-white shadow-soft border border-slate-200 p-7">

    <!-- Header -->
    <div class="flex items-center gap-3 mb-5">
      <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-mabisa-500 text-white shadow-soft">
        <span class="text-sm font-semibold tracking-tight">MB</span>
      </div>
      <div>
        <p class="text-lg font-semibold text-slate-900">MABISA</p>
        <p class="text-xs text-slate-500">
          Makassar Bukti & Insentif Satu Aplikasi
        </p>
      </div>
    </div>

    <!-- Title -->
    <h1 class="text-xl font-semibold text-slate-900 mb-1">Masuk ke Akun Anda</h1>
    <p class="text-sm text-slate-600 mb-6">
      Silakan masuk menggunakan email terdaftar.
    </p>
    @if ($errors->any())
        <div class="alert alert-danger text-l bg-red-950 rounded-lg text-white p-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>⚠️{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!-- Form Login -->
    <!-- NOTE: nanti ganti action="/login" versi Laravel -->
    <form action="{{ route('login') }}" method="post" class="space-y-4">
      @csrf
      <!-- Email -->
      <div>
        <label class="text-xs text-slate-600">Email</label>
        <input
          type="email"
          name="email"
          required
          class="mt-1 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm focus:border-mabisa-400 focus:ring-mabisa-400"
          placeholder="Masukkan NIK atau nomor HP"
        />
      </div>

      <!-- Password -->
      <div class="relative">
        <label class="text-xs text-slate-600">Password</label>
        <input
          id="password"
          type="password"
          name="password"
          required
          class="mt-1 w-full rounded-xl border border-slate-300 bg-slate-50 px-3 py-2.5 text-sm pr-10 focus:border-mabisa-400 focus:ring-mabisa-400"
          placeholder="••••••••"
        />

        <!-- Toggle -->
        <button
          type="button"
          id="togglePw"
          class="absolute right-3 top-9 text-xs text-slate-500"
        >Lihat</button>
      </div>

      <!-- Remember me -->
      <div class="flex items-center justify-between text-sm pt-1">
        <label class="flex items-center gap-2">
          <input
            type="checkbox"
            name="remember"
            class="h-4 w-4 rounded border-slate-300"
          />
          <span class="text-slate-600 text-xs">Ingat saya</span>
        </label>

        <a href="/forgot" class="text-xs text-mabisa-600 hover:text-mabisa-700">
          Lupa password?
        </a>
      </div>

      <!-- Submit -->
      <button
        type="submit"
        class="w-full rounded-full bg-mabisa-500 py-2.5 text-sm font-semibold text-white shadow-soft hover:bg-mabisa-600"
      >
        Masuk
      </button>
    </form>

    <!-- Footer kecil -->
    <p class="text-xs text-slate-500 mt-6 text-center">
      Bagian dari ekosistem <strong class="text-slate-700">SIGAP BRIDA</strong>.
    </p>

  </div>

  <!-- Script -->
  <script>
    // Toggle visibility password
    const pwInput = document.getElementById('password');
    const togglePw = document.getElementById('togglePw');
    togglePw.addEventListener('click', () => {
      if (pwInput.type === 'password') {
        pwInput.type = 'text';
        togglePw.textContent = 'Sembunyikan';
      } else {
        pwInput.type = 'password';
        togglePw.textContent = 'Lihat';
      }
    });
  </script>

</body>
</html>
