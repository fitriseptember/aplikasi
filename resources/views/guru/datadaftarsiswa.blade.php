<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Siswa</title>
    <style>
    body {
        font-family: 'Poppins', sans-serif;
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
        color: #4b4b4b; /* Warna teks gelap */
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        overflow: hidden;
        border-radius: 10px; /* Sudut membulat untuk tabel */
    }

    table th {
        background-color: #695CFE; /* Ungu pastel */
        color: #fff; /* Warna teks putih */
        text-transform: uppercase; /* Huruf kapital semua */
        font-size: 14px;
        padding: 12px;
        text-align: center;
    }

    table td {
        background-color: #ffffff; /* Putih */
        color: #4b4b4b; /* Warna teks gelap */
        font-size: 14px;
        padding: 12px;
        text-align: center;
    }

    table tr:nth-child(odd) td {
        background-color: #f4f4f9; /* Biru muda sangat lembut */
    }

    table tr:hover td {
        background-color: #e7e3fc; /* Biru pastel lembut saat hover */
        cursor: pointer;
    }
</style>

</head>
<body>
    @extends('guru.dashboard')

    @section('title', 'Daftar Siswa')

    @section('content')
    <div class="container">
        <h1>Daftar Siswa</h1>
        <table>
            <thead>
                <tr>
                    <th>Nama Lengkap</th>
                    <th>Gender</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($accounts as $account)
                    <tr>
                        <td>{{ $account->nama_lengkap }}</td>
                        <td>{{ $account->gender }}</td>
                        <td>{{ $account->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="empty-message">Tidak ada data siswa yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @endsection
</body>
</html>
