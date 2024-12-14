<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Tempat PKL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #695CFE;
            color: #ffffff;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:nth-child(odd) {
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <h1>Daftar Tempat PKL</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Tempat PKL</th>
                <th>Alamat</th>
                <th>Guru Pembimbing</th>
                <th>Mentor PKL</th>
                <th>Siswa PKL</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tempatPkl as $tempat)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $tempat->pkl_place }}</td>
                <td>{{ $tempat->pkl_address }}</td>
                <td>{{ $tempat->pkl_teacher }}</td>
                <td>{{ $tempat->pkl_mentor }}</td>
                <td>{{ $tempat->pkl_student }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
