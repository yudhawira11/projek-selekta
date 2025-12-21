<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang — Soil Sense</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&family=Poppins:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/LOGO 2.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root{--green:#264615;--light:#d9d9d9;--muted:#797979}
        body{font-family:'Inter', 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; margin:0;color:var(--green);-webkit-font-smoothing:antialiased}
        .header{display:flex;align-items:center;justify-content:space-between;padding:18px 48px;position:relative}
        .brand{font-weight:700;color:var(--green);font-size:18px;letter-spacing:0.2px;position:absolute;left:50%;transform:translateX(-50%)}
        .container{max-width:1180px;margin:34px auto;padding:0 28px}
        h1.title{font-size:48px;margin:8px 0 28px;font-weight:800;line-height:1.05}
        .grid{display:grid;grid-template-columns:1.1fr 0.9fr;gap:36px;align-items:start}
        .card{background:var(--light);border-radius:30px;padding:40px}
        .card.large{min-height:420px}
        .steps{display:flex;align-items:center;justify-content:space-between;padding:18px 10px}
        .step{display:flex;flex-direction:column;align-items:center;gap:12px}
        .step .icon{width:84px;height:84px;border-radius:50%;background:#cfcfcf;display:flex;align-items:center;justify-content:center;overflow:hidden}
        .step .icon img{width:44px;height:44px;opacity:0.75}
        .benefits ul{margin:12px 0 0;padding-left:20px;color:var(--green);font-size:16px;line-height:1.8}
        .card.large p{font-size:16px;text-align:justify;text-justify:inter-word}
        footer{text-align:center;padding:28px 0;color:var(--green);font-size:14px}
        /* right sidebar menu */
        .side-menu{position:fixed;right:0;top:0;height:100vh;background:var(--green);width:300px;border-top-left-radius:50px;border-bottom-left-radius:50px;display:flex;flex-direction:column;align-items:center;gap:36px;padding-top:80px;color:#fff}
        .side-menu{transition:transform .25s ease,opacity .2s ease}
        .side-menu.collapsed{transform:translateX(110%);opacity:0;pointer-events:none}
        .side-menu .nav a{display:block;font-weight:700;font-size:32px;color:#fff;padding:18px 0;text-decoration:none;letter-spacing:0.4px}
        .toggle{display:flex;gap:12px;align-items:center}
        @media(max-width:900px){
            .grid{grid-template-columns:1fr}
            .side-menu{position:static;width:100%;height:auto;border-radius:0;padding:24px}
            body{padding-bottom:24px}
            h1.title{font-size:36px}
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="theme-toggle" style="position:fixed;left:18px;top:18px;z-index:60">
            <button id="themeToggle" aria-pressed="false" title="Toggle theme" style="display:flex;align-items:center;gap:10px;background:transparent;border:0;padding:6px;">
                <img src="{{ asset('images/icon-2007-133.svg') }}" alt="theme icon" width="20" height="20" />
                <span class="switch" aria-hidden="true" style="width:46px;height:26px;background:#ececec;border-radius:999px;display:inline-block;position:relative;box-shadow:inset 0 0 0 2px rgba(0,0,0,0.06);">
                    <span class="knob" style="position:absolute;left:4px;top:3px;width:20px;height:20px;background:#fff;border-radius:50%;box-shadow:0 2px 6px rgba(0,0,0,0.15);transition:transform .18s ease"></span>
                </span>
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" stroke="#000" stroke-width="1" fill="#000" opacity="0.9"/></svg>
            </button>
        </div>
        <div class="brand">Soil Sense: Fertility and Nutrient Monitoring Dashboard</div>
        <div style="position:fixed;right:18px;top:12px">@include('components.logo')</div>
    </header>

    <main class="container">
        <h1 class="title">Tentang Soil Sense</h1>
        <div class="grid">
            <div class="card large">
                <p style="font-weight:600;line-height:1.9;color:var(--green);font-size:18px;">
                    SoilSense adalah Platform yang dirancang untuk memudahkan pemantauan kualitas tanah. Dengan menampilkan data seperti Nitrogen (N), Phosphorus (P), Potassium (K), serta kelembaban (Moisture) dalam bentuk indikator dan grafik, SoilSense memberikan gambaran yang jelas mengenai kondisi tanah. Platform ini membantu petani, pelajar, dan peneliti dalam mengelola lahan berdasarkan data nyata, bukan sekadar perkiraan.
                </p>
            </div>

            <div style="display:flex;flex-direction:column;gap:22px">
                <div class="card">
                    <h3 style="margin-top:0;color:var(--green);font-size:22px;font-weight:700">Bagaimana Cara Kerjanya</h3>
                    <div class="steps">
                        <div class="step">
                            <div class="icon"><img src="https://www.figma.com/api/mcp/asset/22dc1c27-fecb-4fb9-aaf8-0896ca71669b" alt="sensor"></div>
                            <div style="font-size:14px;margin-top:6px;color:var(--green)">Sensor Tanah</div>
                        </div>
                        <div style="font-size:24px;color:var(--muted);align-self:center">→</div>
                        <div class="step">
                            <div class="icon"><img src="https://www.figma.com/api/mcp/asset/facc149a-3bf6-4c78-be5c-a2ae3c5eb2d3" alt="input"></div>
                            <div style="font-size:14px;margin-top:6px;color:var(--green)">Masukkan Data</div>
                        </div>
                        <div style="font-size:24px;color:var(--muted);align-self:center">→</div>
                        <div class="step">
                            <div class="icon"><img src="https://www.figma.com/api/mcp/asset/1aa45e84-23af-4455-b8cb-e01efa4f833a" alt="send"></div>
                            <div style="font-size:14px;margin-top:6px;color:var(--green)">Kirim Data</div>
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

    <footer>
        © 2025 SoilCode Team. All rights reserved.
    </footer>

    <aside class="side-menu" id="siteAside">
        <button id="asideToggle" aria-expanded="true" title="Toggle menu" style="width:44px;height:44px;border:0;background:transparent;color:inherit;display:flex;align-items:center;justify-content:center;margin:0;padding:0;">
            <svg width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4 6h16M4 12h16M4 18h16" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/></svg>
        </button>
        @include('components.logo')
        <nav class="nav">
            <a href="/">Home</a>
            <a href="/about">About</a>
            <a href="/soil-sense">Check</a>
        </nav>
    </aside>
    <script>
        (function(){
            var btn = document.getElementById('asideToggle');
            var aside = document.getElementById('siteAside');
            if(!btn || !aside) return;
            btn.addEventListener('click', function(e){
                var collapsed = aside.classList.toggle('collapsed');
                btn.setAttribute('aria-expanded', collapsed ? 'false' : 'true');
            });
        })();
    </script>
</body>
</html>
