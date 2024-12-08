<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan PKL</title>

    <style>
        /* Container utama untuk form laporan */
        .container {
            width: 100%;
            max-width: 800px;
            margin: auto;
            background-color: #fff;
            padding: 40px; /* Padding lebih besar agar lebih luas */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            color: #333;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #4a90e2;
            font-size: 2.5em; /* Membuat judul lebih besar */
            margin-bottom: 20px;
        }

        /* Teks motivasi di bagian atas form */
        .motivational-text {
            text-align: center;
            margin-bottom: 30px;
            font-style: italic;
            color: #6c757d;
        }

        .motivational-text p {
            margin: 0;
        }

        /* Styling untuk label */
        label {
            display: block;
            margin-bottom: 12px; /* Menambah jarak antara label dan input */
            font-weight: bold;
            font-size: 1.2em; /* Menambah ukuran font untuk label */
            color: #555;
        }

        /* Styling untuk input dan textarea */
        input[type="date"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 15px; /* Menambah padding agar input lebih besar */
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1.1em; /* Menambah ukuran font di dalam input */
            box-sizing: border-box;
        }

        /* Styling khusus untuk textarea */
        textarea {
            resize: vertical;
            height: 200px; /* Membuat textarea lebih tinggi */
        }

        /* Styling untuk tombol kirim */
        button[type="submit"] {
            width: 100%;
            padding: 15px; /* Menambah padding tombol */
            background-color: #695CFE;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            margin-top: 30px; /* Menambah jarak di atas tombol */
            transition: background-color 0.3s;
        }

        /* Efek hover pada tombol */
        button[type="submit"]:hover {
            background-color: #695CFE;
        }

        /* Styling untuk footer */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 30px;
            font-size: 0.9em;
            color: #6c757d;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 768px) {
            .container {
                padding: 20px; /* Mengurangi padding di layar kecil */
            }

            h1 {
                font-size: 1.8em;
            }

            input[type="date"],
            input[type="file"],
            textarea {
                font-size: 1.2em;
                padding: 12px; /* Membuat ukuran input lebih besar di layar kecil */
            }
        }
    </style>
</head>

<body>
    <!-- Menggunakan layout 'dashboard' dari siswa -->
    @extends('siswa.dashboard')

    <!-- Menentukan title untuk halaman ini -->
    @section('title', 'Absensi Siswa')

    @section('content')
    <main>
        <div class="container">
            <!-- Judul form laporan -->
            <h1>Laporan Kegiatan PKL</h1>

            <!-- Teks motivasi di bagian atas form -->
            <div class="motivational-text">
                <p><em>Kehadiranmu Adalah Kunci Kesuksesan!</em></p>
                <p>Disiplin adalah langkah pertama menuju keberhasilan. Isi laporan harianmu, dan tunjukkan komitmenmu
                    kepada dunia.</p>
            </div>

            <!-- Form untuk mengirim laporan kegiatan PKL -->
            <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- Input untuk tanggal laporan -->
                <label for="tanggal">Tanggal :</label>
                <input type="date" id="tanggal" name="tanggal" required readonly>

                <!-- Input untuk deskripsi kegiatan -->
                <label for="deskripsi">Deskripsi Kegiatan:</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required placeholder="Masukkan deskripsi kegiatan..."></textarea>

                <!-- Input untuk unggah foto kegiatan -->
                <label for="fotoKegiatan">Unggah Foto Kegiatan:</label>
                <input type="file" id="fotoKegiatan" name="foto_kegiatan" accept="image/*" required>

                <!-- Tombol untuk mengirim laporan -->
                <button type="submit" class="btn-submit">Kirim Laporan</button>
            </form>
        </div>
    </main>

    <!-- Script untuk mengatur tanggal input agar selalu terisi dengan tanggal hari ini -->
    <script>
        // Set the date input field to today's date and make it readonly
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('tanggal');
            const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
            dateInput.value = today; // Set tanggal input ke tanggal hari ini
        });
    </script>
    @endsection
</body>

</html>
