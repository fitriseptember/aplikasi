<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absen Siswa</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif; /* Mengatur font keluarga */
            margin: 0; /* Menghapus margin default */
            padding: 0; /* Menghapus padding default */
            background-color: #f7f7f7; /* Warna latar belakang halaman */
        }

        .container {
            max-width: 800px; /* Lebar maksimum kontainer */
            margin: 0 auto; /* Mengatur margin agar kontainer terpusat */
            padding: 20px; /* Memberikan padding dalam kontainer */
            background-color: #ffffff; /* Warna latar belakang kontainer */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Menambahkan bayangan pada kontainer */
            border-radius: 8px; /* Membulatkan sudut kontainer */
        }

        h1 {
            text-align: center; /* Memusatkan teks judul */
            margin-bottom: 20px; /* Menambahkan jarak bawah pada judul */
            font-size: 2.5em; /* Ukuran font judul */
            color: #695CFE; /* Warna teks judul */
        }

        .form-group {
            margin-bottom: 20px; /* Jarak bawah pada setiap grup form */
        }

        label {
            display: block; /* Membuat label tampil sebagai blok */
            margin-bottom: 8px; /* Jarak bawah pada label */
            font-weight: bold; /* Menebalkan teks label */
            font-size: 1.2em; /* Ukuran font label */
            color: #695CFE; /* Warna teks label */
        }

        input[type="text"],
        input[type="date"] {
            width: 100%; /* Lebar input 100% */
            padding: 15px; /* Memberikan padding dalam input */
            margin-bottom: 10px; /* Jarak bawah pada input */
            border: 1px solid #695CFE; /* Border input */
            border-radius: 4px; /* Membulatkan sudut input */
            font-size: 1.1em; /* Ukuran font input */
            transition: border-color 0.3s; /* Efek transisi pada border saat fokus */
        }

        input[type="text"]:focus {
            border-color: #695CFE; /* Ubah warna border saat input difokuskan */
            outline: none; /* Menghilangkan outline pada input */
        }

        .btn-submit {
            display: block; /* Menjadikan tombol tampil sebagai blok */
            width: 100%; /* Lebar tombol 100% */
            padding: 15px; /* Memberikan padding dalam tombol */
            background-color: #695CFE; /* Warna latar tombol */
            color: white; /* Warna teks tombol */
            border: none; /* Menghilangkan border tombol */
            border-radius: 4px; /* Membulatkan sudut tombol */
            cursor: pointer; /* Mengubah kursor menjadi pointer saat hover */
            font-size: 1.2em; /* Ukuran font tombol */
            transition: background-color 0.3s; /* Efek transisi pada latar belakang tombol */
        }

        .btn-submit:hover {
            background-color: #8881d4; /* Warna tombol saat hover */
        }

        .status-table {
            margin-top: 20px; /* Jarak atas pada tabel status */
        }

        table {
            width: 100%; /* Lebar tabel 100% */
            border-collapse: collapse; /* Menghilangkan jarak antara border tabel */
            margin-bottom: 20px; /* Jarak bawah tabel */
        }

        table th,
        table td {
            border: 1px solid #ddd; /* Border tabel */
            padding: 15px; /* Padding dalam sel tabel */
            text-align: center; /* Menyelaraskan teks ke tengah */
            font-size: 1.1em; /* Ukuran font dalam sel tabel */
        }

        table th {
            background-color: #f0f0f0; /* Warna latar belakang header tabel */
            color: #555; /* Warna teks header tabel */
        }

        .attendance-info {
            margin-top: 30px; /* Jarak atas pada bagian informasi kehadiran */
        }

        .attendance-info h2 {
            text-align: center; /* Memusatkan teks sub-judul */
            margin-bottom: 20px; /* Jarak bawah pada sub-judul */
            font-size: 1.8em; /* Ukuran font sub-judul */
            color: #333; /* Warna teks sub-judul */
        }

        .info-box {
            background-color: #f9f9f9; /* Warna latar belakang kotak informasi */
            padding: 15px; /* Padding dalam kotak informasi */
            border-radius: 5px; /* Membulatkan sudut kotak informasi */
        }

        .info-item {
            margin-bottom: 15px; /* Jarak bawah pada setiap item informasi */
        }

        .info-item strong {
            color: #444; /* Warna teks kuat dalam item informasi */
        }

        .info-item p {
            color: #555; /* Warna teks normal dalam item informasi */
        }
    </style>
</head>

<body>
    @extends('siswa.dashboard') <!-- Menyertakan layout dashboard siswa -->

    @section('title', 'Absensi Siswa') <!-- Menyatakan title halaman -->

    @section('content') <!-- Menentukan konten utama halaman -->
    <div class="container">
        <h1>Absen Siswa</h1> <!-- Judul halaman absen -->

        <!-- Mengecek apakah absensi sudah diisi untuk hari ini -->
        @if($absensiSudahDiisi)
            <p class="info-box" style="color: green; font-weight: bold; text-align: center;">
                Anda sudah mengisi absen hari ini. Terima kasih!
            </p>
        @else
            <!-- Formulir untuk mengisi absen -->
            <form action="{{ route('absen.store') }}" method="POST" id="absenForm">
                @csrf <!-- Token CSRF untuk keamanan form -->
                <div class="form-group">
                    <label for="tanggal">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" readonly> <!-- Input tanggal yang hanya bisa dibaca -->
                </div>

                <div class="status-table">
                    <p class="status-title">Pilih Status Kehadiran:</p>
                    <!-- Tabel untuk memilih status kehadiran -->
                    <table>
                        <thead>
                            <tr>
                                <th>Status</th>
                                <th>Hadir</th>
                                <th>Sakit</th>
                                <th>Izin</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Status Absensi</td>
                                <td><input type="radio" name="status" value="hadir" required></td> <!-- Pilihan hadir -->
                                <td><input type="radio" name="status" value="sakit"></td> <!-- Pilihan sakit -->
                                <td><input type="radio" name="status" value="izin"></td> <!-- Pilihan izin -->
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn-submit">Kirim Absensi</button> <!-- Tombol untuk mengirim absen -->
            </form>
        @endif

        <!-- Informasi terkait absensi -->
        <section class="attendance-info">
            <h2>Informasi Kehadiran</h2>
            <div class="info-box">
                <div class="info-item">
                    <p><strong>Batas Waktu Absen:</strong></p>
                    <p>Pukul 08:00 hingga 12:00</p>
                </div>
                <div class="info-item">
                    <p><strong>Catatan:</strong></p>
                    <p>Pastikan mengisi absen dalam rentang waktu yang ditentukan.</p>
                </div>

            </div>
        </section>
    </div>

    <script>
        // Mengisi tanggal otomatis pada input tanggal
        document.getElementById('tanggal').value = new Date().toISOString().split('T')[0];

        // Validasi waktu sebelum submit form
        const absenForm = document.getElementById('absenForm');
        absenForm?.addEventListener('submit', function (event) {
            const currentHour = new Date().getHours(); // Mendapatkan jam saat ini
            if (currentHour >= 18) { // Jika waktu sudah lebih dari jam 12
                alert('Batas waktu pengisian absen telah berakhir.'); // Menampilkan alert
                event.preventDefault(); // Mencegah form dikirim
            }
        });
    </script>
    @endsection
</body>

</html>
