<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cek Tanah — Soil Sense</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
  <link rel="icon" type="image/png" href="{{ asset('images/LOGO 2.png') }}">
  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <style>
    input[type="range"] {
      -webkit-appearance: none;
      appearance: none;
      width: 100%;
      height: 4px;
      border-radius: 999px;
      background: #e6e6e6;
      outline: none;
      cursor: pointer;
    }
    
    input[type="range"]::-webkit-slider-thumb {
      -webkit-appearance: none;
      appearance: none;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: #fff;
      cursor: pointer;
      border: 3px solid #888;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }
    
    input[type="range"]::-moz-range-thumb {
      width: 38px;
      height: 38px;
      border-radius: 50%;
      background: #fff;
      cursor: pointer;
      border: 3px solid #888;
      box-shadow: 0 2px 8px rgba(0,0,0,0.15);
    }

    @media (max-width: 768px) {
      input[type="range"] {
        height: 3px;
      }
      
      input[type="range"]::-webkit-slider-thumb {
        width: 32px;
        height: 32px;
      }
      
      input[type="range"]::-moz-range-thumb {
        width: 32px;
        height: 32px;
      }

      div[style*="display:flex;justify-content:space-between"] {
        flex-direction: column;
        align-items: flex-start !important;
      }

      div[style*="background:#d2ebce"] {
        flex-direction: column;
        text-align: center;
      }

      div[style*="background:#fadfca"] {
        flex-direction: column;
        text-align: center;
      }

      div[style*="background:#ded6ee"] {
        flex-direction: column;
        text-align: center;
      }

      div[style*="background:#c8e3f8"] {
        flex-direction: column;
        text-align: center;
      }
    }
    :root { --green:#264615; --light:#d9d9d9; --muted:#797979; --bg:#fff; --text:#264615; }
    html.dark-theme { --bg:#0f1720; --text:#dbe7d0; --light:#1a2633; --green:#8DC63F; --muted:#96a89a; }
    body{margin:0;font-family:'Inter','Poppins',system-ui,-apple-system,'Segoe UI',Roboto,Arial; background:var(--bg); color:var(--text);-webkit-font-smoothing:antialiased;transition:background .4s,color .4s}
    .header{display:flex;align-items:center;justify-content:space-between;padding:12px 28px;position:relative;z-index:100}
    .brand{font-weight:800;font-size:30px;color:var(--green);position:absolute;top:18px;left:50%;transform:translateX(-50%);white-space:nowrap;margin:0}
    .container{max-width:1200px;margin:50px auto;padding:0 24px;display:flex;justify-content:center}
    .grid{display:grid;grid-template-columns:600px;gap:28px;align-items:start;justify-self:center}
    .card{background:var(--light);border-radius:20px;padding:28px;box-sizing:border-box}
    .card.stat{display:flex;align-items:center;justify-content:space-between;padding:20px;gap:12px}
    .stat-left{display:flex;align-items:center;gap:16px}
    .stat-left .icon{width:68px;height:68px;border-radius:16px;background:#fff;display:flex;align-items:center;justify-content:center}
    .stat-left h4{margin:0;font-size:20px;color:var(--green);font-weight:700}
    .stat-value{font-size:40px;color:var(--green);font-weight:800}
    .progress{height:12px;border-radius:999px;background:#e6e6e6;overflow:hidden;width:320px}
    .progress > i{display:block;height:100%;background:linear-gradient(90deg,#8DC63F,#2a89db)}
    .sidebar{position:fixed;top:0;right:-320px;width:300px;height:100vh;background:var(--green);color:#fff;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:60px;border-top-left-radius:50px;border-bottom-left-radius:50px;transition:right .4s ease;z-index:200}
    .sidebar.active{right:0}
    .sidebar .nav a{display:block;color:#fff;text-decoration:none;font-family:'Poppins',sans-serif;font-size:28px;font-weight:700;text-align:center;transition:opacity .2s ease}
    .sidebar .nav a:hover{opacity:.85}
    .sidebar .menu-btn{position:absolute;top:32px;background:transparent;border:none;cursor:pointer}
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
    <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:32px;margin-top:-40px;flex-wrap:wrap;gap:16px">
      <h1 class="title" style="font-size:48px;margin:0;font-weight:800;color:var(--green);flex:1;min-width:300px">Input Nutrient &amp; Moisture Levels</h1>
      <div style="display:flex;gap:12px;align-items:center">
        <div style="background:#2a89db;color:#fff;border:0;padding:12px 20px;border-radius:50px;font-weight:700;font-size:16px">Minggu 4</div>
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M6 9L12 15L18 9" stroke="#2a89db" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <div style="width:50px;height:50px;background:#2a89db;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;font-size:24px">📅</div>
      </div>
    </div>

    <div class="grid">
      <form method="POST" action="/cek-tanah/save" style="width:100%;display:flex;flex-direction:column;gap:18px">
        @csrf

        <!-- Nitrogen Card -->
        <div style="background:#d2ebce;border-radius:30px;padding:20px 28px;display:flex;align-items:center;gap:20px;box-shadow:0 2px 8px rgba(0,0,0,0.05);min-height:135px">
          <div style="width:68px;height:68px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.6)">
            <img src="https://www.figma.com/api/mcp/asset/39bbaa13-f5a1-41f2-a326-65deb734bc83" alt="N" style="width:50px;height:50px;object-fit:contain"/>
          </div>
          <div style="flex:1;display:flex;flex-direction:column;gap:8px">
            <h3 style="margin:0;font-size:28px;font-weight:800;color:var(--green)">Nitrogen (N)</h3>
            <div style="display:flex;gap:12px;align-items:center;width:100%">
              <input type="range" name="nitrogen" value="65" min="0" max="100" style="flex:1;height:3px;border-radius:999px;background:linear-gradient(90deg,#8DC63F 0%,#8DC63F 65%,#e6e6e6 65%,#e6e6e6 100%)" oninput="updateSlider(this,'nitrogen-val')"/>
            </div>
          </div>
          <span style="font-size:32px;font-weight:800;color:var(--green);min-width:60px;text-align:right;flex-shrink:0" class="nitrogen-val">65%</span>
        </div>

        <!-- Phosphorus Card -->
        <div style="background:#fadfca;border-radius:30px;padding:20px 28px;display:flex;align-items:center;gap:20px;box-shadow:0 2px 8px rgba(0,0,0,0.05);min-height:135px">
          <div style="width:68px;height:68px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.6)">
            <img src="https://www.figma.com/api/mcp/asset/569070ff-b426-430d-9bc8-0f7c1a7f7e50" alt="P" style="width:50px;height:50px;object-fit:contain"/>
          </div>
          <div style="flex:1;display:flex;flex-direction:column;gap:8px">
            <h3 style="margin:0;font-size:28px;font-weight:800;color:var(--green)">Phosphorus (P)</h3>
            <div style="display:flex;gap:12px;align-items:center;width:100%">
              <input type="range" name="phosphorus" value="40" min="0" max="100" style="flex:1;height:3px;border-radius:999px;background:linear-gradient(90deg,#ff8c42 0%,#ff8c42 40%,#e6e6e6 40%,#e6e6e6 100%)" oninput="updateSlider(this,'phosphorus-val')"/>
            </div>
          </div>
          <span style="font-size:32px;font-weight:800;color:var(--green);min-width:60px;text-align:right;flex-shrink:0" class="phosphorus-val">40%</span>
        </div>

        <!-- Potassium Card -->
        <div style="background:#ded6ee;border-radius:30px;padding:20px 28px;display:flex;align-items:center;gap:20px;box-shadow:0 2px 8px rgba(0,0,0,0.05);min-height:135px">
          <div style="width:68px;height:68px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.6)">
            <img src="https://www.figma.com/api/mcp/asset/f6ddb53a-734e-41e8-bfc8-88344dce83ba" alt="K" style="width:50px;height:50px;object-fit:contain"/>
          </div>
          <div style="flex:1;display:flex;flex-direction:column;gap:8px">
            <h3 style="margin:0;font-size:28px;font-weight:800;color:var(--green)">Potassium (K)</h3>
            <div style="display:flex;gap:12px;align-items:center;width:100%">
              <input type="range" name="potassium" value="20" min="0" max="100" style="flex:1;height:3px;border-radius:999px;background:linear-gradient(90deg,#9966cc 0%,#9966cc 20%,#e6e6e6 20%,#e6e6e6 100%)" oninput="updateSlider(this,'potassium-val')"/>
            </div>
          </div>
          <span style="font-size:32px;font-weight:800;color:var(--green);min-width:60px;text-align:right;flex-shrink:0" class="potassium-val">20%</span>
        </div>

        <!-- Moisture Card -->
        <div style="background:#c8e3f8;border-radius:30px;padding:20px 28px;display:flex;align-items:center;gap:20px;box-shadow:0 2px 8px rgba(0,0,0,0.05);min-height:135px">
          <div style="width:68px;height:68px;flex-shrink:0;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.6)">
            <img src="https://www.figma.com/api/mcp/asset/d1a5281f-0e9c-4aa6-9b59-c48b580b5a37" alt="moisture" style="width:50px;height:50px;object-fit:contain"/>
          </div>
          <div style="flex:1;display:flex;flex-direction:column;gap:8px">
            <h3 style="margin:0;font-size:28px;font-weight:800;color:var(--green)">Moisture</h3>
            <div style="display:flex;gap:12px;align-items:center;width:100%">
              <input type="range" name="moisture" value="55" min="0" max="100" style="flex:1;height:3px;border-radius:999px;background:linear-gradient(90deg,#2a9bd5 0%,#2a9bd5 55%,#e6e6e6 55%,#e6e6e6 100%)" oninput="updateSlider(this,'moisture-val')"/>
            </div>
          </div>
          <span style="font-size:32px;font-weight:800;color:var(--green);min-width:60px;text-align:right;flex-shrink:0" class="moisture-val">55%</span>
        </div>

        <div style="display:flex;justify-content:center;margin-top:28px">
          <button type="submit" style="background:#2a89db;color:#fff;border:0;padding:16px 48px;border-radius:50px;font-weight:700;font-size:24px;cursor:pointer;transition:all .2s ease;box-shadow:0 2px 8px rgba(42,137,219,0.3)" onmouseover="this.style.opacity='0.9';this.style.transform='translateY(-2px)'" onmouseout="this.style.opacity='1';this.style.transform='translateY(0)'">Save Data</button>
        </div>
      </form>
    </div>
  </main>

  <script>
    function updateSlider(input, className) {
      const value = input.value;
      
      // Update percentage display
      document.querySelector('.' + className).textContent = value + '%';
      
      // Update gradient
      const colors = {
        'nitrogen-val': '#8DC63F',
        'phosphorus-val': '#ff8c42',
        'potassium-val': '#9966cc',
        'moisture-val': '#2a9bd5'
      };
      const color = colors[className];
      input.style.background = `linear-gradient(90deg,${color} 0%,${color} ${value}%,#e6e6e6 ${value}%,#e6e6e6 100%)`;
    }
  </script>

  <footer>© 2025 SoilCode Team. All rights reserved.</footer>

  <!-- Sidebar -->
  <aside class="sidebar" id="sidebar">
    <button class="menu-btn" id="closeSidebar" aria-label="Close menu">
      <svg width="40" height="40" viewBox="0 0 24 24" fill="none"><path d="M4 6h16M4 12h16M4 18h16" stroke="#fff" stroke-width="2" stroke-linecap="round"/></svg>
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
    // Sidebar toggle (keeps behavior consistent with about.blade.php)
    const sidebar = document.getElementById('sidebar');
    const menuBtn = document.getElementById('menuBtn');
    const closeSidebar = document.getElementById('closeSidebar');
    if (menuBtn && closeSidebar && sidebar) {
      menuBtn.addEventListener('click', () => sidebar.classList.add('active'));
      closeSidebar.addEventListener('click', () => sidebar.classList.remove('active'));
    }
    // NOTE: theme is handled centrally in resources/js/app.js — no inline theme script here
  </script>
</body>
</html>
