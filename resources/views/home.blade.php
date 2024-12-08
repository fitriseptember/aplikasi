<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #fdfbff; /* Warna latar belakang halaman */
            display: flex;
            align-items: center; /* Vertikal align center */
            justify-content: center; /* Horizontal align center */
            min-height: 100vh; /* Memastikan tinggi halaman memenuhi viewport */
            padding: 20px; /* Memberikan jarak di tepi halaman */
        }

        .container {
            display: flex;
            align-items: center; /* Vertikal align center */
            justify-content: space-between; /* Membagi ruang antara konten dan gambar */
            max-width: 1200px;
            width: 100%;
            background-color: #fff; /* Warna latar belakang kontainer */
            border-radius: 15px; /* Membuat sudut kontainer melengkung */
            padding: 40px; /* Memberikan jarak di dalam kontainer */
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Memberikan efek bayangan pada kontainer */
        }

        .content {
            max-width: 500px; /* Membatasi lebar konten */
        }

        /* Efek Fade In untuk teks */
        @keyframes fadeIn {
            from {
                opacity: 0; /* Mulai dengan transparan */
            }
            to {
                opacity: 1; /* Berakhir dengan teks terlihat */
            }
        }

        .content h1 {
            font-size: 2.5rem; /* Ukuran font judul */
            color: #333; /* Warna teks judul */
            margin-bottom: 15px; /* Jarak antara judul dan teks berikutnya */
            line-height: 1.3; /* Jarak antar baris */
            font-weight: 700; /* Menebalkan font judul */
            animation: fadeIn 2s ease-in-out; /* Menambahkan efek fade-in pada judul */
        }

        .content p {
            font-size: 1rem; /* Ukuran font untuk paragraf */
            color: #666; /* Warna teks paragraf */
            line-height: 1.5; /* Jarak antar baris pada paragraf */
            margin-bottom: 20px; /* Jarak antara paragraf dan elemen berikutnya */
        }

        /* Gaya untuk tombol CTA (Call To Action) */
        .content .cta-button {
            display: inline-block;
            padding: 10px 20px; /* Ukuran padding untuk tombol */
            background-color: #695CFE; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks tombol */
            text-decoration: none; /* Menghapus garis bawah pada teks */
            border-radius: 25px; /* Membuat tombol dengan sudut melengkung */
            font-weight: bold; /* Menebalkan font tombol */
            transition: background-color 0.3s ease, transform 0.3s ease; /* Menambahkan efek transisi */
        }

        /* Efek hover pada tombol CTA */
        .content .cta-button:hover {
            background-color: #7e73f8; /* Warna latar belakang tombol saat hover */
            transform: translateY(-5px); /* Efek tombol naik sedikit saat hover */
        }

        .image-container {
            max-width: 400px; /* Membatasi lebar gambar */
        }

        /* Gaya untuk gambar */
        .image-container img {
            width: 100%; /* Membuat gambar menyesuaikan lebar kontainer */
            border-radius: 10px; /* Membuat sudut gambar melengkung */
        }

        /* Gaya untuk kredit gambar */
        .credit {
            margin-top: 20px;
            font-size: 0.8rem; /* Ukuran font untuk kredit */
            color: #aaa; /* Warna teks kredit */
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Content Section -->
        <div class="content">
            <!-- Judul Halaman -->
            <h1>Monitoring PKL Siswa pengembangan perangkat lunak dan GIM</h1>
            <!-- Deskripsi halaman -->
            <p>Program Praktik Kerja Lapangan (PKL) bertujuan memberikan pengalaman nyata kepada siswa di dunia kerja, mengembangkan keterampilan dan disiplin untuk menghadapi tantangan karier di masa depan.</p>
            <!-- Tombol untuk masuk -->
            <a href="{{ route('login') }}" class="cta-button">Masuk</a>
        </div>
        <!-- Image Section -->
        <div class="image-container">
            <!-- Gambar di bagian kanan halaman -->
            <img src="{{ asset('storage/images/fotohome.jpeg') }}" alt="Logo" class="logo-img">
        </div>
    </div>
</body>

</html>
