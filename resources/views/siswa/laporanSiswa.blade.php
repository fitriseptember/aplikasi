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
            padding: 40px;
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

        label {
            font-weight: bold;
            font-size: 1.2em;
            color: #555;
        }

        input[type="date"],
        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 15px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1.1em;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
            height: 200px;
        }

        button[type="submit"] {
            width: 100%;
            padding: 15px;
            background-color: #695CFE;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.2em;
            margin-top: 30px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #5a4cf0;
        }

        .form-group {
            margin-bottom: 20px;
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #f9f9f9;
            margin-top: 30px;
            font-size: 0.9em;
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 1.8em;
            }

            input[type="date"],
            input[type="text"],
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

    @section('title', 'Laporan Kegiatan PKL')

    @section('content')
    <main>
        <div class="container">
            <h1>Laporan Kegiatan PKL</h1>

            <div class="motivational-text">
                <p><em>Kehadiranmu Adalah Kunci Kesuksesan!</em></p>
                <p>Disiplin adalah langkah pertama menuju keberhasilan. Isi laporan harianmu, dan tunjukkan komitmenmu
                    kepada dunia.</p>
            </div>

            <form id="laporanForm" action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="tanggal">Tanggal :</label>
                    <input type="date" id="tanggal" name="tanggal" required readonly>
                </div>

                <div class="form-group">
                    <label for="tempat_pkl">Nama Tempat PKL :</label>
                    <input type="text" id="tempat_pkl" name="tempat_pkl" placeholder="Masukkan nama tempat PKL" required>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi Kegiatan :</label>
                    <textarea id="deskripsi" name="deskripsi" rows="5" required placeholder="Masukkan deskripsi kegiatan..."></textarea>
                </div>

                <div class="form-group">
                    <label for="fotoKegiatan">Unggah Foto Kegiatan :</label>
                    <input type="file" id="fotoKegiatan" name="foto_kegiatan" accept="image/*" required>
                </div>

                <button type="submit" class="btn-submit">Kirim Laporan</button>
            </form>
        </div>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const dateInput = document.getElementById('tanggal');
            const today = new Date().toISOString().split('T')[0];
            dateInput.value = today;
        });
    </script>
    @endsection
</body>

</html>
