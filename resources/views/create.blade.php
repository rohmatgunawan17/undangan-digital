<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Buat Undangan - {{ strtoupper($theme) }}</title>
    <style>
        body{font-family:Inter,system-ui,sans-serif;background:#f9f3ee;color:#231f20;padding:32px}
        .card{background:#fff;padding:22px;border-radius:12px;max-width:720px;margin:0 auto;border:1px solid #efe0db}
        .actions{display:flex;gap:10px;justify-content:flex-end;margin-top:14px}
        .btn{padding:10px 14px;border-radius:10px;border:none;cursor:pointer}
        .btn-primary{background:#d6433f;color:#fff}
        .btn-ghost{background:#fff;border:1px solid #d6433f;color:#d6433f}
    </style>
</head>
<body>
    <div class="card">
        <h1>Memulai dengan tema: <strong>{{ $theme }}</strong></h1>
        <p>Halaman ini menerima parameter tema via query string dan menyiapkan flow pembuatan undangan.</p>
        <p>Contoh link tema: <code>{{ url('/create') }}?theme={{ $theme }}</code></p>
        <div class="actions">
            <a class="btn btn-ghost" href="{{ url('/') }}">Kembali</a>
            <button class="btn btn-primary" onclick="alert('Mulai flow pembuatan untuk tema: {{ $theme }}')">Mulai</button>
        </div>
    </div>
</body>
</html>
