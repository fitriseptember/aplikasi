<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #e0e0e0;
        /* Warna abu-abu untuk background utama */
        color: #333;
    }

    header {
        width: 100%;
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        background-color: #333;
        color: #fff;
    }

    header .logo {
        font-size: 24px;
        font-weight: bold;
    }

    header nav a {
        color: #fff;
        margin: 0 15px;
        text-decoration: none;
    }

    header nav a:hover {
        color: #b0bec5;
    }

    .hero {
        width: 100%;
        text-align: center;
        padding: 100px 20px;
        background: linear-gradient(to right, #bdbdbd, #9e9e9e);
        /* Gradien abu-abu */
        color: #333;
    }

    .hero h1 {
        font-size: 3em;
        margin-bottom: 10px;
    }

    .hero p {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .cta-button {
        padding: 10px 20px;
        background-color: #757575;
        /* Tombol dengan warna abu-abu */
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.3s;
    }

    .cta-button:hover {
        background-color: #616161;
    }

    .highlights {
        display: flex;
        justify-content: space-around;
        margin: 50px 0;
        width: 80%;
    }

    .card {
        background-color: #ffffff;
        /* Kartu putih untuk kontras */
        padding: 20px;
        width: 30%;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        text-align: center;
    }

    .testimonials {
        text-align: center;
        width: 80%;
        margin: 50px 0;
    }

    .testimonials h2 {
        font-size: 2em;
        margin-bottom: 20px;
    }

    .testimonial {
        background-color: #ffffff;
        /* Warna putih untuk kontras */
        padding: 15px;
        margin: 10px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    footer {
        background-color: #424242;
        /* Warna abu-abu lebih gelap untuk footer */
        color: #fff;
        padding: 20px;
        width: 100%;
        text-align: center;
    }

    .socials a {
        color: #fff;
        margin: 0 10px;
        text-decoration: none;
    }

    .socials a:hover {
        color: #b0bec5;
    }
</style>

<body>

    <!-- Header -->
    <header>
        <div class="logo">LOGO</div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <h1>Monitoring PKL Siswa</h1>
        <p>Tempat absensi dan pengiriman laporan</p>
    <a href="{{ route('login') }}" class="cta-button">Masuk</a>

    </section>

    <!-- Highlights Section -->
    <section class="highlights">
        <div class="card">
            <h3>Informasi Umum</h3>
            <p>Program Praktik Kerja Lapangan (PKL) bertujuan untuk memberikan pengalaman nyata kepada siswa di dunia
                kerja.</p>
        </div>
        <div class="card">
            <h3>Catatan Penting</h3>
            <p>Pengiriman absen dikirim sebelum pukul 12 siang dan laporan dikirim sebelum pukul 12 malam.</p>
        </div>
        <div class="card">
            <h3>Kutipan Inspiratif</h3>
            <p>"Kesuksesan adalah hasil dari usaha yang tidak kenal lelah." - Anonim</p>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Company Name. All rights reserved.</p>
    </footer>

</body>

</html>