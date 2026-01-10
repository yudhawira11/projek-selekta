<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Soil Sense</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/LOGO 2.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    <div class="theme-toggle" style="position:fixed;left:18px;top:18px;z-index:60">
      <button id="themeToggle" aria-pressed="false" title="Toggle theme" style="display:flex;align-items:center;gap:10px;background:transparent;border:0;padding:6px;cursor:pointer;">
        <img src="{{ asset('images/icon-2007-133.svg') }}" alt="theme icon" width="20" height="20" />
        <span class="switch" aria-hidden="true" style="width:46px;height:26px;background:#ececec;border-radius:999px;display:inline-block;position:relative;box-shadow:inset 0 0 0 2px rgba(0,0,0,0.06);">
          <span class="knob" style="position:absolute;left:4px;top:3px;width:20px;height:20px;background:#fff;border-radius:50%;box-shadow:0 2px 6px rgba(0,0,0,0.15);transition:transform .18s ease"></span>
        </span>
        <svg id="themeIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z" stroke="#000" stroke-width="1" fill="#000" opacity="0.9"/></svg>
      </button>
    </div>
    <div class="page">
      <div class="card">
        <div class="left">
          <div class="illustration">
            <img alt="Soil illustration" src="{{ asset('images/icon-tanaman.svg') }}">
          </div>
        </div>

        <div class="right">
          <h1 class="title">Soil Sense</h1>

          @include('components.logo')

          <p class="lead">Cek Kesuburan dan Kelembapan tanahmu<br/>secara langsung!</p>

          <div style="display:flex;flex-direction:column;gap:10px;">
            <a class="btn btn-green" href="/about">Tentang Soil Sense</a>
            <a class="btn btn-brown" href="#">Mulai Cek Tanah</a>
          </div>

          <div class="footer">© 2025 SoilCode Team. All rights reserved.</div>
        </div>
      </div>
    </div>
  </body>
</html>
