<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Buat Undangan - {{ strtoupper($theme) }}</title>
    <style>
        body {
            font-family: Inter, system-ui, sans-serif;
            background: #f9f3ee;
            color: #231f20;
            padding: 32px
        }

        .card {
            background: #fff;
            padding: 22px;
            border-radius: 12px;
            max-width: 720px;
            margin: 0 auto;
            border: 1px solid #efe0db
        }

        .actions {
            display: flex;
            gap: 10px;
            justify-content: flex-end;
            margin-top: 14px
        }

        .btn {
            padding: 10px 14px;
            border-radius: 10px;
            border: none;
            cursor: pointer
        }

        .btn-primary {
            background: #d6433f;
            color: #fff
        }

        .btn-ghost {
            background: #fff;
            border: 1px solid #d6433f;
            color: #d6433f
        }
    </style>
</head>

<body>
    <div class="card">
        <h1>Memulai dengan tema: <strong>{{ $theme }}</strong></h1>
        <p>Halaman ini menerima parameter tema via query string dan menyiapkan flow pembuatan undangan.</p>
        <p>Contoh link tema: <code>{{ url('/create') }}?theme={{ $theme }}</code></p>

        <div style="margin:18px 0;display:flex;gap:10px;align-items:center;justify-content:space-between;flex-wrap:wrap">
            <div>
                <label for="theme-select" style="font-weight:700;margin-right:8px">Pilih Tema</label>
                <select id="theme-select">
                    @foreach ($allowed as $t)
                        <option value="{{ $t }}" @if ($t == $theme) selected @endif>
                            {{ ucwords(str_replace('-', ' ', $t)) }}</option>
                    @endforeach
                </select>
            </div>
            <div style="text-align:right">
                <a class="btn btn-ghost" href="{{ url('/') }}">Kembali</a>
                <button id="start-btn" class="btn btn-primary">Mulai</button>
            </div>
        </div>

        <div id="theme-preview" style="margin-top:12px">
            @includeIf('themes.' . $theme)
        </div>

        <div class="actions" style="margin-top:12px">
            <button class="btn btn-ghost"
                onclick="window.location='{{ url('/create') }}?theme=' + encodeURIComponent(document.getElementById('theme-select').value)">Lihat</button>
            <button class="btn btn-primary"
                onclick="alert('Mulai flow pembuatan untuk tema: ' + document.getElementById('theme-select').value)">Mulai</button>
        </div>
    </div>
</body>

</html>
