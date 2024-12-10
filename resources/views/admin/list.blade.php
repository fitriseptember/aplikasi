<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Akun</title>
    <style>
        /* Mengatur gaya dasar untuk body */
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f9;
    color: #333;
}
        /* Kontainer utama */
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Gaya untuk judul halaman */
        h1 {
            font-size: 24px;
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Gaya untuk pesan sukses */
        .success-message {
            color: green;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Tabel */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 16px;
        }

        /* Header tabel */
        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #695CFE;
            color: #ffffff;
            text-transform: uppercase;
        }

        /* Warna baris tabel */
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }

        /* Hover efek untuk baris tabel */
        tr:hover {
            background-color: #f1f1f1;
        }

        /* Responsif untuk layar kecil */
        @media (max-width: 600px) {
            table {
                font-size: 14px;
            }

            th, td {
                padding: 8px;
            }

            h1 {
                font-size: 20px;
            }
        }
    </style>
</head>

    </style>
</head>
<body>
     @extends('admin.dashboard')

@section('title', 'Absensi Siswa')

@section('content')
    <div class="container">
        <h1>Daftar Akun</h1>
        @if(session('success'))
            <div class="success-message">{{ session('success') }}</div>
        @endif
          <table>
            <thead>
                <tr>
                    <th>Role</th>
                    <th>Gender</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @forelse($accounts as $account)
                    <tr>
                        <td>{{ $account->role }}</td>
                        <td>{{ $account->gender }}</td>
                        <td>{{ $account->nama_lengkap }}</td>
                        <td>{{ $account->username }}</td>
                        <td>{{ $account->email }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" style="text-align: center;">Tidak ada data akun yang ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
     @endsection
</body>
</html>
