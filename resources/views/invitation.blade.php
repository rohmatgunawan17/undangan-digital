<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Indoinvite') }}</title>
    <style>
        :root {
            color-scheme: light;
            font-family: Inter, system-ui, sans-serif;
            background: #f9f3ee;
            color: #231f20;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f9f3ee;
            color: #231f20;
        }

        a,
        button {
            font: inherit;
        }

        .page {
            width: 100%;
            max-width: 1320px;
            margin: 0 auto;
            padding: 28px 20px 60px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            margin-bottom: 30px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 1.05rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.14em;
            color: #d6433f;
        }

        .mark {
            width: 42px;
            height: 42px;
            border-radius: 999px;
            background: #d6433f;
            display: grid;
            place-items: center;
            color: #ffffff;
            font-size: 0.9rem;
            font-weight: 800;
        }

        .nav {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .nav a {
            color: #4b3d3a;
            text-decoration: none;
            font-weight: 700;
        }

        .hero {
            background: linear-gradient(145deg, #fff3ee 0%, #f8d7ce 100%);
            border-radius: 32px;
            padding: 64px 48px;
            display: grid;
            gap: 36px;
        }

        .hero-eyebrow {
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.18em;
            color: #a94d43;
            font-size: 0.9rem;
            font-weight: 700;
        }

        .hero-heading {
            margin: 0;
            font-size: clamp(2.8rem, 4.8vw, 4.8rem);
            line-height: 0.98;
            max-width: 920px;
            letter-spacing: -0.03em;
        }

        .hero-copy {
            margin: 0;
            max-width: 760px;
            font-size: 1.05rem;
            line-height: 1.8;
            color: #5f4f4e;
        }

        .hero-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 16px;
        }

        .btn-primary,
        .btn-secondary {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 16px 28px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary {
            background: #d6433f;
            color: #ffffff;
            border: 1px solid transparent;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 28px rgba(214, 67, 63, 0.23);
        }

        .btn-secondary {
            background: #ffffff;
            color: #d6433f;
            border: 1px solid #d6433f;
        }

        .hero-note {
            margin: 0;
            font-size: 0.95rem;
            color: #6a5752;
            max-width: 740px;
        }

        .categories {
            display: grid;
            gap: 16px;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .category {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 18px 20px;
            border-radius: 22px;
            background: #ffffff;
            border: 1px solid #f1ded9;
            box-shadow: 0 10px 28px rgba(180, 110, 100, 0.08);
        }

        .category-icon {
            width: 44px;
            height: 44px;
            border-radius: 16px;
            display: grid;
            place-items: center;
            background: #f8d7d2;
            color: #a3473f;
            font-size: 1.2rem;
            font-weight: 700;
        }

        .category-label {
            font-weight: 700;
            color: #453a35;
        }

        .section-title {
            margin: 0 0 24px;
            font-size: 2rem;
            color: #302524;
        }

        .cards {
            display: grid;
            gap: 24px;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        }

        .card {
            padding: 24px;
            border-radius: 28px;
            background: #ffffff;
            border: 1px solid #f0ded8;
            box-shadow: 0 20px 42px rgba(176, 118, 107, 0.12);
        }

        .card-price {
            margin: 0;
            font-size: 1.05rem;
            font-weight: 800;
            color: #d6433f;
        }

        .card-title {
            margin: 12px 0 18px;
            font-size: 1.25rem;
            font-weight: 700;
            color: #2a1e1d;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #b26f5f;
        }

        .rating small {
            color: #8f7a74;
        }

        .card-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 22px;
        }

        .btn-sm {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 12px 18px;
            border-radius: 999px;
            text-decoration: none;
            font-weight: 700;
            border: 1px solid transparent;
        }

        .preview {
            background: #ffffff;
            color: #4c322f;
            border-color: #e4d5d0;
        }

        .use {
            background: #d6433f;
            color: #ffffff;
        }

        .footer {
            margin-top: 48px;
            padding: 28px 28px 32px;
            border-radius: 28px;
            background: #fff4ef;
            border: 1px solid #f1ddd7;
            display: grid;
            gap: 20px;
        }

        .footer p {
            margin: 0;
            color: #62524d;
            font-size: 0.95rem;
            line-height: 1.75;
        }

        .grid-features {
            display: grid;
            gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        }

        .feature {
            padding: 22px 20px;
            border-radius: 22px;
            background: #ffffff;
            border: 1px solid #f2e6e1;
        }

        .feature strong {
            display: block;
            margin-bottom: 10px;
            color: #4a3833;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        .feature p {
            margin: 0;
            color: #6a5752;
            line-height: 1.75;
            font-size: 0.96rem;
        }

        @media (min-width: 1100px) {
            .page {
                padding: 36px 36px 80px;
            }

            .hero {
                padding: 72px 64px;
            }

            .header {
                gap: 32px;
            }

            .cards {
                grid-template-columns: repeat(3, minmax(0, 1fr));
            }
        }

        @media (max-width: 860px) {
            .hero {
                border-radius: 24px;
            }
        }
    </style>
</head>

<body>
    <main class="page">
        <header class="header">
            <div class="brand">
                <span class="mark">IN</span>
                {{ config('app.name', 'Indoinvite') }}
            </div>
            <nav class="nav">
                <a href="#">Beranda</a>
                <a href="#">Tema</a>
                <a href="#">Keunggulan</a>
                <a href="#">Kontak</a>
            </nav>
        </header>

        <section class="hero">
            <p class="hero-eyebrow">Buat Undangan Digital Gratis</p>
            <h1 class="hero-heading">Untuk Pernikahan, Khitanan, Aqiqah, Ulang Tahun, Seminar, Launching, dan Semua
                Acara Tanpa Ribet!</h1>
            <p class="hero-copy">Coba sekarang dan buat undangan digital uji coba <strong>GRATIS</strong> untuk segala
                acara dalam waktu <strong>5 menit</strong>. Tidak mau ribet? Minta dibuatin admin dulu, bayar hanya jika
                suka hasilnya.</p>
            <div class="hero-actions">
                <a class="btn-primary" href="mailto:info@invitation.local?subject=Uji%20Coba%20Gratis">Uji Coba
                    Gratis</a>
                <a class="btn-secondary" href="mailto:info@invitation.local?subject=Dibuatin%20Admin%20Aja">Dibuatin
                    Admin Aja</a>
            </div>
            <p class="hero-note">Anti Rugi! Dibuatin admin dulu, bayar pas sudah jadi, bayar hanya kalau suka hasilnya.
                Proses kilat dan tanpa repot.</p>
        </section>

        <section style="margin-top: 34px;">
            <ul class="categories">
                <li class="category">
                    <div class="category-icon">👰</div><span class="category-label">Pernikahan</span>
                </li>
                <li class="category">
                    <div class="category-icon">🪙</div><span class="category-label">Khitanan</span>
                </li>
                <li class="category">
                    <div class="category-icon">🕋</div><span class="category-label">Aqiqah</span>
                </li>
                <li class="category">
                    <div class="category-icon">🎉</div><span class="category-label">Ulang Tahun</span>
                </li>
                <li class="category">
                    <div class="category-icon">🎓</div><span class="category-label">Wisuda</span>
                </li>
                <li class="category">
                    <div class="category-icon">🎤</div><span class="category-label">Seminar</span>
                </li>
                <li class="category">
                    <div class="category-icon">🏛️</div><span class="category-label">Peresmian</span>
                </li>
                <li class="category">
                    <div class="category-icon">✨</div><span class="category-label">Custom</span>
                </li>
            </ul>
        </section>

        <section style="margin-top: 42px;">
            <h2 class="section-title">Template Unggulan</h2>
            <div class="cards">
                <div class="card">
                    <p class="card-price">Rp 39.000</p>
                    <h3 class="card-title">Elegan Grey</h3>
                    <div class="rating"><span>★★★★★</span><small>(4.9)</small></div>
                    <div class="card-actions">
                        <a class="btn-sm preview" href="#">Preview</a>
                        <a class="btn-sm use" href="#">Gunakan Tema</a>
                    </div>
                </div>
                <div class="card">
                    <p class="card-price">Rp 39.000</p>
                    <h3 class="card-title">Black Java</h3>
                    <div class="rating"><span>★★★★★</span><small>(4.9)</small></div>
                    <div class="card-actions">
                        <a class="btn-sm preview" href="#">Preview</a>
                        <a class="btn-sm use" href="#">Gunakan Tema</a>
                    </div>
                </div>
                <div class="card">
                    <p class="card-price">Rp 39.000</p>
                    <h3 class="card-title">Elegan Gold</h3>
                    <div class="rating"><span>★★★★★</span><small>(4.9)</small></div>
                    <div class="card-actions">
                        <a class="btn-sm preview" href="#">Preview</a>
                        <a class="btn-sm use" href="#">Gunakan Tema</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="footer">
            <p>Indoinvite menyediakan undangan digital profesional untuk setiap momen spesial Anda. Mudah, cepat, dan
                siap dibagikan ke WhatsApp atau media sosial.</p>
            <div class="grid-features">
                <div class="feature">
                    <strong>5 Menit Siap</strong>
                    <p>Buat undangan digital dalam hitungan menit tanpa desain rumit.</p>
                </div>
                <div class="feature">
                    <strong>Gratis Uji Coba</strong>
                    <p>Mulai gratis dulu, lalu pilih paket atau minta admin bantu buat.</p>
                </div>
                <div class="feature">
                    <strong>Support Custom</strong>
                    <p>Template bisa disesuaikan untuk pernikahan, khitanan, aqiqah, acara resmi, dan lainnya.</p>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
