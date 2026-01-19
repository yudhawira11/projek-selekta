<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Tentang — Soil Sense</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/LOGO 2.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    :root {
      --green: #264615;
      --light: #d9d9d9;
      --muted: #797979;
      --bg: #fff;
      --text: #264615;
    }

    html.dark-theme {
      --bg: #0f1720;
      --text: #dbe7d0;
      --light: #1a2633;
      --green: #8DC63F;
      --muted: #96a89a;
    }

    body {
      margin: 0;
      font-family: 'Inter', 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, Arial;
      background: var(--bg);
      color: var(--text);
      -webkit-font-smoothing: antialiased;
      transition: background 0.4s ease, color 0.4s ease;
    }

    .header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 28px;
      position: relative;
      z-index: 100;
    }

    .brand {
      font-weight: 800;
      font-size: 30px;
      color: var(--green);
      text-align: center;
      position: absolute;
      top: 18px;
      left: 50%;
      transform: translateX(-50%);
      white-space: nowrap;
      margin: 0;
      letter-spacing: -0.5px;
    }

    /* Container */
    .container {
      max-width: 1200px;
      margin: 50px auto;
      padding: 0 24px;
    }

    h1.title {
      font-size: 40px;
      margin: 12px 0 24px;
      font-weight: 800;
      color: var(--green);
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 420px;
      gap: 28px;
      align-items: start;
    }

    .card {
      background: var(--light);
      border-radius: 20px;
      padding: 28px;
      transition: background 0.3s ease;
      box-sizing: border-box;
    }

    .card.large {
      min-height: 360px;
      display: flex;
      align-items: flex-start;
      justify-content: flex-start;
    }

    .card.large p {
      font-size: 18px;
      font-weight: 600;
      color: var(--green);
      text-align: justify;
      line-height: 1.9;
      margin: 0;
    }

    .steps {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 12px 6px;
    }

    .step {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 8px;
    }

    .step .icon {
      width: 68px;
      height: 68px;
      border-radius: 50%;
      background: #cfcfcf;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .step .icon img {
      width: 36px;
      height: 36px;
      opacity: 0.85;
    }

    .benefits ul {
      margin: 12px 0 0;
      padding-left: 20px;
      color: var(--green);
      font-size: 15px;
      line-height: 1.8;
    }

    footer {
      text-align: center;
      padding: 28px 0;
      color: var(--green);
      font-size: 14px;
    }

    /* Sidebar */
    .sidebar {
      position: fixed;
      top: 0;
      right: -320px;
      width: 300px;
      height: 100vh;
      background: var(--green);
      color: white;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 60px;
      border-top-left-radius: 50px;
      border-bottom-left-radius: 50px;
      transition: right 0.4s ease;
      z-index: 200;
    }

    .sidebar.active { right: 0; }

    .sidebar .nav a {
      display: block;
      color: white;
      text-decoration: none;
      font-family: 'Poppins', sans-serif;
      font-size: 28px;
      font-weight: 700;
      text-align: center;
      transition: opacity 0.2s ease;
    }

    .sidebar .nav a:hover { opacity: 0.85; }

    /* Logo + Hamburger */
    .menu-group {
      display: flex;
      align-items: center;
      gap: 16px;
      position: fixed;
      right: 28px;
      top: 18px;
      z-index: 300;
    }

    .menu-btn { background: none; border: none; cursor: pointer; display: flex; align-items: center; justify-content: center; transition: opacity 0.2s; }
    .menu-btn:hover { opacity: 0.7; }

    /* Inside Sidebar Hamburger */
    .sidebar .menu-btn { position: absolute; top: 32px; background: transparent; border: none; cursor: pointer; }

    /* How It Works: heading on top; steps flow/wrap and scroll vertically when needed */
    .card.how {
      display: flex;
      flex-direction: column;
      gap: 12px;
      align-items: stretch;
      padding: 20px;
      box-sizing: border-box;
      width: 100%;
    }

    .card.how h3 { margin: 0; font-size:22px; color:var(--green); }

    .card.how .steps {
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 12px;
      flex-wrap: nowrap; /* keep items in one row */
      width: 100%;
      box-sizing: border-box;
      padding: 6px 4px;
      overflow: visible; /* no scrollbar */
    }

    .card.how .step { min-width: 0; flex: 1 1 auto; text-align:center; }
    .card.how .step .icon { width: 64px; height: 64px; }
    .card.how .step .icon img { width: 36px; height: 36px; }
    .arrow { font-size: 16px; color: var(--muted); align-self: center; }

    /* Benefits card: heading on top, list below */
    .card.benefits {
      display: flex;
      flex-direction: column;
      gap: 8px;
      align-items: stretch;
      padding: 20px;
      box-sizing: border-box;
      width: 100%;
    }

    .card.benefits h3 { margin: 0; font-size:22px; color:var(--green); }

    @media (max-width: 900px) {
      .grid { grid-template-columns: 1fr; }
      h1.title { font-size: 36px; }
      .brand { font-size: 15px; margin-left: 12px; }
      .card.large { min-height: auto; }
      .menu-group { right: 16px; }
    }
  </style>
</head>

<body>
  <header class="header">
    <!-- Theme Toggle -->
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

    <!-- Logo + Hamburger -->
    <div class="menu-group">
      @include('components.logo')
      <button class="menu-btn" id="menuBtn" aria-label="Open menu">
        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
          <path d="M3 6h18M3 12h18M3 18h18" stroke="#264615" stroke-width="2" stroke-linecap="round"/>
        </svg>
      </button>
    </div>
  </header>

  <main class="container">
    <h1 class="title">Tentang Soil Sense</h1>
    <div class="grid">
      <div class="card large">
        <p>
          SoilSense adalah Platform yang dirancang untuk memudahkan pemantauan kualitas tanah. Dengan menampilkan data seperti Nitrogen (N), Phosphorus (P), Potassium (K), serta kelembaban (Moisture) dalam bentuk indikator dan grafik, SoilSense memberikan gambaran yang jelas mengenai kondisi tanah. Platform ini membantu petani, pelajar, dan peneliti dalam mengelola lahan berdasarkan data nyata, bukan sekadar perkiraan.
        </p>
      </div>

      <div style="display:flex;flex-direction:column;gap:22px">
        <div class="card how">
          <h3 style="margin-top:0;color:var(--green);font-size:22px;font-weight:700">Bagaimana Cara Kerjanya</h3>
            <div class="steps">
              <div class="step">
                <div class="icon"><img src="{{ asset('images/sensor-icon.png') }}" alt="sensor" width="36" height="36" /></div>
                <div style="font-size:14px;color:var(--green)">Sensor Tanah</div>
              </div>
              <div class="arrow">→</div>
              <div class="step">
                <div class="icon"><img src="{{ asset('images/input-icon.png') }}" alt="input" width="36" height="36" /></div>
                <div style="font-size:14px;color:var(--green)">Masukkan Data</div>
              </div>
              <div class="arrow">→</div>
              <div class="step">
                <div class="icon"><img src="{{ asset('images/send-icon.png') }}" alt="send" width="36" height="36" /></div>
                <div style="font-size:14px;color:var(--green)">Kirim Data</div>
              </div>
          </div>
        </div>

        <div class="card benefits">
          <h3 style="margin-top:0;color:var(--green);font-size:22px;font-weight:700">Manfaat Soil Sense</h3>
          <ul>
            <li>Memantau kesuburan tanah secara real-time</li>
            <li>Membantu menentukan kebutuhan pupuk</li>
            <li>Mencegah kekeringan dan kerusakan tanaman</li>
            <li>Mendukung pertanian modern (smart farming)</li>
          </ul>
        </div>
      </div>
    </div>
  </main>

  <footer>© 2025 SoilCode Team. All rights reserved.</footer>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <button class="menu-btn" id="closeSidebar" aria-label="Close menu">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none">
        <path d="M4 6h16M4 12h16M4 18h16" stroke="#fff" stroke-width="2" stroke-linecap="round"/>
      </svg>
    </button>

    <div style="width:120px;height:120px;background:#fff;border-radius:50%;display:flex;align-items:center;justify-content:center;overflow:hidden;">
      <img src="{{ asset('images/LOGO 2.png') }}" alt="Soil Sense Logo" style="width:88px;height:88px;object-fit:cover;display:block;">
    </div>

    <nav class="nav">
      <a href="/">Home</a>
      <a href="/about">About</a>
      <a href="/cek-tanah">Check</a>
    </nav>
  </aside>

  <script>
    // Sidebar toggle
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menuBtn');
    const closeSidebar = document.getElementById('closeSidebar');

    menuBtn.addEventListener('click', () => sidebar.classList.add('active'));
    closeSidebar.addEventListener('click', () => sidebar.classList.remove('active'));
  </script>
</body>
</html>
