<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width,initial-scale=1"/>
  <title>Permintaan Undangan — MABISA</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style> :root{--m:#b1333f} </style>
</head>
<body class="bg-slate-50 text-slate-900">
  <main class="mx-auto max-w-3xl p-6">
    <header class="mb-6 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <div class="h-10 w-10 rounded-2xl bg-[color:var(--m)] text-white flex items-center justify-center font-semibold">MB</div>
        <div>
          <h1 class="text-lg font-semibold">Permintaan Undangan — MABISA</h1>
          <p class="text-xs text-slate-500">Pendaftaran langsung ditutup. Untuk akses, minta undangan resmi dari BRIDA.</p>
        </div>
      </div>
      <a href="/" class="text-xs text-slate-700 underline">Kembali ke Publik</a>
    </header>

    <section class="mb-6 rounded-xl bg-white p-5 shadow">
      <h2 class="font-semibold">Kenapa pendaftaran ditutup?</h2>
      <p class="mt-2 text-sm text-slate-700">Untuk menjaga keamanan data dan mencegah pendaftaran tidak sah. Jika Anda Ketua RT/RW atau staf kelurahan, gunakan formulir di bawah untuk meminta token aktivasi. Permintaan akan diverifikasi oleh admin BRIDA.</p>
    </section>

    <section class="rounded-xl bg-white p-5 shadow">
      <h3 class="font-semibold mb-3">Form Request Invite</h3>
      <!-- NOTE: ganti action ke endpoint backend yang buat tiket -->
      <form id="requestForm" action="/request-invite" method="post" class="grid gap-3">
        <!-- server-side: tambahkan CSRF token jika perlu -->
        <label class="flex flex-col">
          <span class="text-xs text-slate-600">Nama Lengkap</span>
          <input name="name" required class="mt-1 rounded-xl border px-3 py-2 bg-slate-50"/>
        </label>

        <label class="flex flex-col">
          <span class="text-xs text-slate-600">NIK</span>
          <input name="nik" inputmode="numeric" class="mt-1 rounded-xl border px-3 py-2 bg-slate-50"/>
        </label>

        <label class="flex flex-col">
          <span class="text-xs text-slate-600">No. HP</span>
          <input name="phone" required inputmode="tel" class="mt-1 rounded-xl border px-3 py-2 bg-slate-50"/>
        </label>

        <label class="flex flex-col">
          <span class="text-xs text-slate-600">Kecamatan / Kelurahan</span>
          <input name="location" placeholder="Contoh: Tamamaung, Biringkanaya" class="mt-1 rounded-xl border px-3 py-2 bg-slate-50"/>
        </label>

        <label class="flex flex-col">
          <span class="text-xs text-slate-600">Peran yang diminta</span>
          <select name="role" class="mt-1 rounded-xl border px-3 py-2 bg-slate-50">
            <option value="">Pilih...</option>
            <option value="rt">RT</option>
            <option value="rw">RW</option>
            <option value="pegawai">Pegawai</option>
          </select>
        </label>

        <label class="flex flex-col">
          <span class="text-xs text-slate-600">Pesan / catatan (opsional)</span>
          <textarea name="note" rows="3" class="mt-1 rounded-xl border px-3 py-2 bg-slate-50"></textarea>
        </label>

        <div class="flex items-center justify-between pt-2">
          <a href="/contact" class="text-sm text-slate-600">Perlu bantuan?</a>
          <button type="submit" class="rounded-full bg-[color:var(--m)] px-4 py-2 text-xs text-white">Kirim Permintaan</button>
        </div>
      </form>
      <p class="mt-3 text-xs text-slate-500">Catatan: permintaan akan diverifikasi; jika disetujui, Anda akan menerima link aktivasi/token.</p>
    </section>
  </main>

  <script>
    // optional client checks
    document.getElementById('requestForm')?.addEventListener('submit', function(e){
      // minimal: ensure phone & name
      const name = this.name.value.trim();
      const phone = this.phone.value.trim();
      if(!name || !phone){ e.preventDefault(); alert('Nama dan No. HP wajib diisi.'); }
    });
  </script>
</body>
</html>
