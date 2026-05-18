<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Undangan - {{ $couple[0] }} & {{ $couple[1] }}</title>
    <style>
        body {
            font-family: Inter, system-ui, sans-serif;
            background: #fff;
            color: #222;
            margin: 0;
            padding: 0
        }

        .hero {
            background: #f9f3ee;
            padding: 36px;
            text-align: center
        }

        .hero img {
            max-width: 240px;
            border-radius: 12px
        }

        .container {
            max-width: 920px;
            margin: 18px auto;
            padding: 18px
        }

        .section {
            margin: 22px 0;
            padding: 18px;
            border-radius: 12px;
            background: #fff;
            border: 1px solid #eee
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px
        }

        .gallery img {
            width: 100%;
            height: 160px;
            object-fit: cover;
            border-radius: 8px
        }

        .btn {
            display: inline-block;
            padding: 10px 14px;
            border-radius: 10px;
            background: #d6433f;
            color: #fff;
            text-decoration: none
        }

        form .row {
            display: flex;
            gap: 8px;
            margin-bottom: 8px
        }

        @media(max-width:720px) {
            .grid {
                grid-template-columns: 1fr
            }
        }
    </style>
</head>

<body>
    <div class="hero">
        <img src="{{ $hero_image }}" alt="hero">
        <h1>{{ $couple[0] }} & {{ $couple[1] }}</h1>
        <p>Tanpa Mengurangi Rasa Hormat, Kami Mengundang {{ $recipient ? 'Kepada: ' . e($recipient) : 'Anda' }}</p>
    </div>

    <div class="container">
        <div class="section">
            <h3>Acara</h3>
            <div class="grid">
                @foreach ($events as $ev)
                    <div>
                        <strong>{{ $ev['title'] }}</strong>
                        <div>{{ $ev['date'] }}</div>
                        <div>{{ $ev['time'] ?? '' }}</div>
                        <div>{{ $ev['location'] }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="section">
            <h3>Our Story</h3>
            <p>{{ $quote_ar }}</p>
        </div>

        <div class="section gallery">
            <h3>Gallery</h3>
            <div class="grid">
                @foreach ($gallery as $img)
                    <img src="{{ $img }}" alt="gallery">
                @endforeach
            </div>
        </div>

        <div class="section">
            <h3>Titip Hadiah (Rekening)</h3>
            <ul>
                @foreach ($banks as $b)
                    <li><strong>{{ $b['name'] }}</strong> — {{ $b['number'] }} ({{ $b['owner'] }})</li>
                @endforeach
            </ul>
        </div>

        <div class="section">
            <h3>Kehadiran</h3>
            @if (session('rsvp_success'))
                <div style="padding:10px;background:#e6ffef;border:1px solid #b6f0c7;margin-bottom:8px">
                    {{ session('rsvp_success') }}</div>
            @endif
            <form method="post" action="{{ route('invite.rsvp', ['sid' => $sid, 'tid' => $tid]) }}">
                @csrf
                <div class="row">
                    <input name="name" placeholder="Nama" required
                        style="flex:1;padding:8px;border-radius:8px;border:1px solid #ddd">
                    <select name="attendance" required style="padding:8px;border-radius:8px;border:1px solid #ddd">
                        <option value="hadir">Hadir</option>
                        <option value="tidak">Tidak Bisa</option>
                    </select>
                </div>
                <div style="margin-bottom:8px"><input name="message" placeholder="Ucapan / Catatan (opsional)"
                        style="width:100%;padding:8px;border-radius:8px;border:1px solid #ddd"></div>
                <div><button class="btn" type="submit">Kirim Kehadiran</button></div>
            </form>
        </div>
    </div>
</body>

</html>
