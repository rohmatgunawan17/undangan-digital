<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Undangan - {{ $couple[0] }} & {{ $couple[1] }}</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Inter:wght@300;400;600&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --bg: #fbf8f6;
            --card: #ffffff;
            --muted: #7a6a62;
            --text: #222222;
            --accent: #b97b3a;
            --radius: 14px;
        }

        * {
            box-sizing: border-box
        }

        body {
            font-family: Inter, system-ui, Segoe UI, Roboto, Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            margin: 0;
            padding: 0
        }

        .hero {
            background: linear-gradient(180deg, rgba(185, 123, 58, 0.06), transparent);
            padding: 72px 24px 48px;
            text-align: center
        }

        .hero .brand-img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            border-radius: 18px;
            box-shadow: 0 18px 40px rgba(15, 12, 10, 0.08);
            margin: 0 auto 18px
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 2.4rem;
            margin: 8px 0 4px;
            color: #2b2b2b;
            letter-spacing: 0.01em
        }

        .subtitle {
            color: var(--muted);
            font-weight: 500;
            margin: 0 0 6px
        }

        .container {
            max-width: 980px;
            margin: 28px auto;
            padding: 0 18px
        }

        .section {
            background: var(--card);
            border-radius: var(--radius);
            padding: 22px;
            margin: 20px 0;
            box-shadow: 0 10px 30px rgba(41, 31, 26, 0.05);
            border: 1px solid rgba(180, 150, 120, 0.12)
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px
        }

        @media(max-width:820px) {
            .grid {
                grid-template-columns: 1fr
            }
        }

        .event-item strong {
            display: block;
            font-weight: 700;
            margin-bottom: 6px;
            color: #2a1e1d
        }

        .event-item div {
            color: var(--muted);
            font-size: 0.95rem
        }

        .quote-ar {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            color: #2b2b2b;
            margin: 0 0 8px;
            line-height: 1.45
        }

        .quote-translation {
            color: var(--muted);
            font-size: 0.95rem
        }

        .gallery img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
            display: block
        }

        ul {
            padding-left: 18px;
            margin: 0
        }

        li {
            margin-bottom: 8px;
            color: var(--muted)
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 10px;
            background: var(--accent);
            color: #fff;
            text-decoration: none;
            border: none;
            cursor: pointer;
            box-shadow: 0 8px 20px rgba(185, 123, 58, 0.12)
        }

        .btn.ghost {
            background: transparent;
            color: var(--accent);
            border: 1px solid rgba(185, 123, 58, 0.12)
        }

        form .row {
            display: flex;
            gap: 10px;
            margin-bottom: 10px
        }

        input,
        select,
        textarea {
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #e6e1dd;
            font-size: 0.95rem;
            color: var(--text);
            width: 100%
        }

        .rsvp-note {
            padding: 12px;
            border-radius: 10px;
            background: #fbfffa;
            border: 1px solid #d9f1df;
            color: #23532a
        }

        .meta {
            color: var(--muted);
            font-size: 0.95rem
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
