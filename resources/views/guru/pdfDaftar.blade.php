<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            color: #000000;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 14px;
        }

        thead th {
            background-color: #4CAF50; /* Warna header */
            color: white;
            padding: 10px;
            border: 1px solid #ddd;
        }

        tbody td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: center;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .empty-message {
            text-align: center;
            color: #777;
        }
    </style>
</head>
<body>
    <h1>Daftar Siswa</h1>
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
</body>
</html>
