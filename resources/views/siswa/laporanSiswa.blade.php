<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan PKL</title>
    <style>
        /* Container */
        .container {
            width: 100%;
            max-width: 800px;
            /* Memperbesar lebar container */
            margin: auto;
            background-color: #fff;
            padding: 40px;
            /* Memperbesar padding */
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            color: #333;
            box-sizing: border-box;
        }

        h1 {
            text-align: center;
            color: #4a90e2;
            font-size: 2.5em;
            /* Membuat font lebih besar */
            margin-bottom: 20px;
        }

        .motivational-text {
            text-align: center;
            margin-bottom: 30px;
            font-style: italic;
            color: #6c757d;
        }

        .motivational-text p {
            margin: 0;
        }

        /* Form Elements */
        label {
            display: block;
            margin-bottom: 12px;
            /* Menambahkan jarak antara label dan input */
            font-weight: bold;
            font-size: 1.2em;
            /* Menambah ukuran font label */
            color: #555;
        }

        input[type="date"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 15px;
            /* Memperbesar padding dalam input */
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1.1em;
            /* Menambah ukuran font dalam input */
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 200px;
            /* Memperbesar tinggi textarea */
        }

        input[type="file"] {
            padding: 10px;
        }

        /* Button Styling */
        button[type="submit"] {
            width: 100%;
            padding: 15px;
            /* Memperbesar padding tombol */
            background-color: #695CFE;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            /* Menambah ukuran font tombol */
            margin-top: 30px;
            /* Menambah jarak atas tombol */
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #695CFE;
        }

        /* Footer Styling */
        footer {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 30px;
            font-size: 0.9em;
            color: #6c757d;
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            /* Membuat ukuran input lebih besar di layar kecil */
            input[type="date"],
            input[type="file"],
            textarea {
                font-size: 1.2em;
                padding: 12px;
            }
        }
    </style>
</head>

<body>
    @extends('siswa.dashboard')

@section('title', 'Absensi Siswa')

@section('content')
    <main>
        <div class="container">
            <h1>Laporan Kegiatan PKL</h1>
            <div class="motivational-text">
                <p><em>Kehadiranmu Adalah Kunci Kesuksesan!</em></p>
                <p>Disiplin adalah langkah pertama menuju keberhasilan. Isi laporan harianmu, dan tunjukkan komitmenmu
                    kepada dunia.</p>
            </div>
            <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data"
                class="form-laporan">
                <label for="tanggal">Tanggal (DD-MM-YYYY):</label>
                <input type="date" id="tanggal" name="tanggal" required readonly>

                <label for="deskripsi">Deskripsi Kegiatan:</label>
                <textarea id="deskripsi" name="deskripsi" rows="5" required
                    placeholder="Masukkan deskripsi kegiatan..."></textarea>

                <label for="fotoKegiatan">Unggah Foto Kegiatan:</label>
                <input type="file" id="fotoKegiatan" name="foto_kegiatan" accept="image/*" required>

                <button type="submit" class="btn-submit">Kirim Laporan</button>
            </form>
        </div>
    </main>

    <script>
        // Set the date input field to today's date and make it readonly
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('tanggal');
            const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
            dateInput.value = today;
        });
    </script>
     @endsection
</body>

</html>
