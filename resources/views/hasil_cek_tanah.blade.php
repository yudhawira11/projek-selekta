<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Hasil Cek Tanah — Soil Sense</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/LOGO 2.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root { --green:#264615; --light:#d9d9d9; --muted:#797979; --bg:#fff; --text:#264615; }
    html.dark-theme { --bg:#0f1720; --text:#dbe7d0; --light:#1a2633; --green:#8DC63F; --muted:#96a89a; }
    body{margin:0;font-family:'Inter','Poppins',system-ui,-apple-system,'Segoe UI',Roboto,Arial; background:var(--bg); color:var(--text);-webkit-font-smoothing:antialiased;transition:background .4s,color .4s}
    .header{display:flex;align-items:center;justify-content:space-between;padding:12px 28px;position:relative;z-index:100}
    .brand{font-weight:800;font-size:30px;color:var(--green);position:absolute;top:18px;left:50%;transform:translateX(-50%);white-space:nowrap;margin:0}
    .container{max-width:1200px;margin:50px auto;padding:0 24px}
    .grid{display:grid;grid-template-columns:1fr 360px;gap:28px;align-items:start}
    .card{background:var(--light);border-radius:20px;padding:28px;box-sizing:border-box}
    .stat{display:flex;flex-direction:column;gap:12px;align-items:flex-start}
    .stat .value{font-size:36px;font-weight:800;color:var(--green)}
    .progress{width:100%;height:14px;border-radius:999px;background:#e6e6e6;overflow:hidden}
    .progress > i{display:block;height:100%;background:linear-gradient(90deg,#8DC63F,#2a89db)}
    .sidebar{position:fixed;top:0;right:-320px;width:300px;height:100vh;background:var(--green);color:#fff;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:36px;border-top-left-radius:50px;border-bottom-left-radius:50px;transition:right .32s cubic-bezier(.2,.9,.2,1);z-index:200;padding-top:48px}
    .sidebar.active{right:0}
    .sidebar .menu-btn{position:absolute;top:18px;right:18px;background:transparent;border:none;cursor:pointer}
    .sidebar-logo{width:120px;height:120px;background:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;overflow:hidden;box-shadow:0 6px 20px rgba(0,0,0,0.08)}
    .sidebar-logo img{width:88px;height:88px;object-fit:cover;display:block}
    .sidebar .nav{display:flex;flex-direction:column;gap:18px;padding:0;margin:0}
    .sidebar .nav a{display:block;color:#fff;text-decoration:none;font-family:'Poppins',sans-serif;font-size:20px;font-weight:700;text-align:center;opacity:0.98;transition:transform .14s ease,opacity .14s ease}
    .sidebar .nav a:hover{opacity:1;transform:translateX(6px)}
    .menu-group{display:flex;align-items:center;gap:16px;position:fixed;right:28px;top:18px;z-index:300}
    .menu-btn{background:none;border:0;cursor:pointer}
    footer{text-align:center;padding:28px 0;color:var(--green);font-size:14px}
    @media (max-width:900px){.grid{grid-template-columns:1fr}.menu-group{right:16px}}
  </style>
</head>
<body>
  <header class="header">
    <div class="theme-toggle" style="position:fixed;left:18px;top:18px;z-index:60">
      <button id="themeToggle" aria-pressed="false" title="Toggle theme" style="display:flex;align-items:center;gap:10px;background:transparent;border:0;padding:6px;cursor:pointer;">
        <img src="{{ asset('images/icon-2007-133.svg') }}" alt="theme icon" width="20" height="20" />
        <span class="switch" aria-hidden="true" style="width:46px;height:26px;background:#ececec;border-radius:999px;display:inline-block;position:relative;box-shadow:inset 0 0 0 2px rgba(0,0,0,0.06);">
          <span id="knob" class="knob" style="position:absolute;left:4px;top:3px;width:20px;height:20px;background:#fff;border-radius:50%;box-shadow:0 2px 6px rgba(0,0,0,0.15);transition:transform .25s ease"></span>
        </span>
        <svg id="themeIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
          <path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" stroke="#000" stroke-width="1" fill="#000" opacity="0.9"/>
        </svg>
      </button>
    </div>

    <div class="brand">Soil Sense: Fertility and Nutrient Monitoring Dashboard</div>

    <div class="menu-group">
      @include('components.logo')
      <button class="menu-btn" id="menuBtn" aria-label="Open menu">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none"><path d="M3 6h18M3 12h18M3 18h18" stroke="#264615" stroke-width="2" stroke-linecap="round"/></svg>
      </button>
    </div>
  </header>

  <main class="container">
    <h1 class="title" style="font-size:40px;margin:0 0 24px;font-weight:800;color:var(--green)">Hasil Cek Tanah</h1>

    <div class="grid">
      <div style="display:flex;flex-direction:column;gap:18px">
        <div class="card">
          <h3 style="margin:0 0 12px;font-size:22px;color:var(--green);font-weight:700">Ringkasan Hasil</h3>
          <p style="margin:0;color:var(--muted)">Berikut hasil pengukuran yang Anda masukkan. Gunakan rekomendasi di samping untuk tindakan yang direkomendasikan.</p>
        </div>

        <div style="display:grid;grid-template-columns:repeat(2,1fr);gap:12px">
          <div class="card stat">
            <h4 style="margin:0;font-size:18px;color:var(--green);font-weight:700">Nitrogen (N)</h4>
            <div class="value">{{ $nitrogen ?? '—' }}%</div>
            <div class="progress"><i style="width:{{ $nitrogen ?? 0 }}%;background:linear-gradient(90deg,#8DC63F,#6caf2b)"></i></div>
          </div>

          <div class="card stat">
            <h4 style="margin:0;font-size:18px;color:var(--green);font-weight:700">Phosphorus (P)</h4>
            <div class="value">{{ $phosphorus ?? '—' }}%</div>
            <div class="progress"><i style="width:{{ $phosphorus ?? 0 }}%;background:linear-gradient(90deg,#ff8c42,#e6731f)"></i></div>
          </div>

          <div class="card stat">
            <h4 style="margin:0;font-size:18px;color:var(--green);font-weight:700">Potassium (K)</h4>
            <div class="value">{{ $potassium ?? '—' }}%</div>
            <div class="progress"><i style="width:{{ $potassium ?? 0 }}%;background:linear-gradient(90deg,#9966cc,#7a4fb2)"></i></div>
          </div>

          <div class="card stat">
            <h4 style="margin:0;font-size:18px;color:var(--green);font-weight:700">Moisture</h4>
            <div class="value">{{ $moisture ?? '—' }}%</div>
            <div class="progress"><i style="width:{{ $moisture ?? 0 }}%;background:linear-gradient(90deg,#2a9bd5,#1f7fb0)"></i></div>
          </div>
        </div>

        <div class="card" style="display:flex;gap:12px;align-items:center;justify-content:space-between">
          <div>
            <h3 style="margin:0;font-size:20px;color:var(--green);font-weight:700">Interpretasi</h3>
            <p style="margin:8px 0 0;color:var(--muted)">Nilai di atas membantu menentukan langkah pemupukan dan pengairan. Perhatikan rekomendasi di sebelah kanan.</p>
          </div>
          <div style="text-align:right;color:var(--muted)">
            <a href="/cek-tanah" style="color:var(--green);font-weight:700;text-decoration:none">Ubah input</a>
          </div>
        </div>
      </div>

      <aside class="card" style="display:flex;flex-direction:column;gap:16px;align-items:stretch">
        <h3 style="margin:0;font-size:20px;color:var(--green);font-weight:700">Rekomendasi</h3>
        <ul style="margin:0;padding-left:18px;color:var(--text);line-height:1.8">
          <li>Tambahkan bahan organik untuk memperbaiki struktur tanah.</li>
          <li>Periksa pH tanah dan sesuaikan bila perlu.</li>
          <li>Atur jadwal irigasi sesuai kelembaban.</li>
        </ul>
        <div style="margin-top:8px"><strong style="color:var(--muted)">Sumber:</strong> Soil Sense Advisor</div>
      </aside>
    </div>
  </main>

  <footer>© 2025 SoilCode Team. All rights reserved.</footer>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <button class="menu-btn" id="closeSidebar" aria-label="Close menu">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none"><path d="M4 6h16M4 12h16M4 18h16" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
    </button>

    <div class="sidebar-logo">
      <img src="{{ asset('images/LOGO 2.png') }}" alt="Soil Sense Logo">
    </div>

    <nav class="nav">
      <a href="/">Home</a>
      <a href="/about">About</a>
      <a href="/cek-tanah">Check</a>
    </nav>
  </aside>

  <script>
    // Sidebar toggle (consistent with other pages)
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menuBtn');
    const closeSidebar = document.getElementById('closeSidebar');
    if (menuBtn && closeSidebar && sidebar) {
      menuBtn.addEventListener('click', () => sidebar.classList.add('active'));
      closeSidebar.addEventListener('click', () => sidebar.classList.remove('active'));
    }
    // Theme: keep markup compatible with central theme script in resources/js/app.js
  </script>
</body>
</html>
