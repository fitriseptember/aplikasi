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
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
        display: flex;
        flex-direction: column;
        align-items: center;
        background-color: #f4f6f9;
        color: #333;
        font-size: 16px;
    }

header {
    width: 100%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px; /* Mengurangi padding untuk navbar */
    background-color: #2c3e50;
    color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .logo {
            width: 80px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

    header nav a {
    color: #fff;
    margin: 0 10px; /* Mengurangi jarak antar link navbar */
    text-decoration: none;
    font-size: 14px; /* Mengurangi ukuran font */
    font-weight: 500;
    transition: color 0.3s ease;
}

header nav a:hover {
    color: #ecf0f1;
}

    .hero {
        width: 100%;
        text-align: center;
        padding: 120px 20px;
        background: linear-gradient(to right, #3498db, #8e44ad);
        color: #fff;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    .hero h1 {
        font-size: 4rem;
        margin-bottom: 20px;
        letter-spacing: 2px;
        font-weight: 700;
    }

    .hero p {
        font-size: 1.5rem;
        margin-bottom: 40px;
    }

    .cta-button {
        padding: 12px 30px;
        background-color: #e74c3c;
        color: #fff;
        text-decoration: none;
        border-radius: 30px;
        font-weight: bold;
        font-size: 1.1rem;
        letter-spacing: 1px;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .cta-button:hover {
        background-color: #c0392b;
        transform: translateY(-4px);
    }

    .highlights {
        display: flex;
        justify-content: space-evenly;
        margin: 80px 0;
        width: 80%;
    }

    .card {
        background-color: #fff;
        padding: 30px;
        width: 30%;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card h3 {
        font-size: 1.8rem;
        margin-bottom: 15px;
        color: #2c3e50;
    }

    .card p {
        font-size: 1.1rem;
        color: #7f8c8d;
        line-height: 1.5;
    }

    footer {
        background-color: #2c3e50;
        color: #fff;
        padding: 20px;
        width: 100%;
        text-align: center;
        margin-top: 80px;
    }

    .socials a {
        color: #fff;
        margin: 0 15px;
        text-decoration: none;
        font-size: 1.5rem;
        transition: color 0.3s ease;
    }

    .socials a:hover {
        color: #ecf0f1;
    }

</style>

<body>

    <!-- Header -->
   <header>
    <div class="logo">
         <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
    </div>
    <nav>
        <!-- Add links to navigation if needed -->
    </nav>
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
        <div class="socials">
            <a href="#">Facebook</a>
            <a href="#">Twitter</a>
            <a href="#">Instagram</a>
        </div>
    </footer>

</body>

</html>