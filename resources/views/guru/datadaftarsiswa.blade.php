<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                background-color: #e7edfb; /* Latar belakang biru muda */
            }

            .container {
                max-width: 800px;
                margin: 50px auto;
                padding: 20px;
                background: #ffffff; /* Warna putih */
                border-radius: 15px; /* Sudut membulat */
                box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Shadow lembut */
            }

            h1 {
                text-align: center;
                font-size: 24px;
                font-weight: bold;
                color:  #444;/* Warna teks gelap */
                margin-bottom: 20px;
            }

            /* Gaya untuk tabel */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
                font-size: 16px;
                border-radius: 8px;
            }

            /* Gaya untuk header tabel */
            thead th {
                background-color: #695CFE;
                color: #ffffff;
                text-align: left;
                padding: 10px;
                border: 1px solid #ddd;
            }

            /* Gaya untuk baris tabel */
            tbody tr {
                border: 1px solid #ddd;
            }

            tbody tr:nth-child(even) {
                background-color: #f9f9f9;
            }

            tbody tr:nth-child(odd) {
                background-color: #ffffff;
            }

            /* Gaya untuk sel tabel */
            td, th {
                color: #000000;
                padding: 10px;
                text-align: center;
            }

            /* Gaya untuk baris kosong */
            tbody tr td[colspan="4"] {
                text-align: center;
                color: #000000;
            }

            /* Gaya hover untuk baris tabel */
            tbody tr:hover {
                background-color: #f1f1f1;
            }

            /* Responsif untuk layar kecil */
            @media (max-width: 600px) {
                table {
                    font-size: 14px;
                }

                h1 {
                    font-size: 20px;
                }
            }
</style>

<!-- Menambahkan CDN untuk jsPDF -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

</head>
<body>
    @extends('guru.dashboard')

    @section('title', 'Daftar Siswa')

    @section('content')
    <div class="container">
        <h1>Daftar Siswa</h1>

        <!-- Tombol Unduh PDF -->
        <div style="margin-bottom: 20px;">
            <a href="{{ route('guru.downloadDaftarSiswaPdf') }}" class="btn btn-primary" style="padding: 10px 15px; background-color: #695CFE; color: white; text-decoration: none; border-radius: 5px;">Download PDF</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($accounts as $account)
                    <tr>
                        <td>{{ $loop->iteration }}</td> {{-- Nomor urut --}}
                        <td>{{ $account->nama_lengkap }}</td>
                        <td>{{ $account->gender }}</td>
                        <td>{{ $account->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="empty-message">Tidak ada data siswa yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>
