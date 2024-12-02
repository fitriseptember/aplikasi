@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f0f0f0;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            padding: 20px;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 1200px;
            margin: auto;
            border: 1px solid #ccc;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2.5em;
            color: #333;
        }

        .motivational-text {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #555;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 15px;
            text-align: center;
            font-size: 1.1em;
        }

        table th {
            background-color: #f0f0f0;
            color: #555;
        }

        .form-group {
            margin-bottom: 20px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 1.2em;
            color: #444;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #bbb;
            border-radius: 4px;
            font-size: 1.1em;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .btn-submit {
            display: block;
            width: 100%;
            padding: 15px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.2em;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #ccc;
        }

        .back .btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.1em;
            margin-top: 15px;
            text-align: center;
        }

        .back .btn:hover {
            background-color: #555;
        }

        @media (min-width: 1024px) {
            .container {
                width: 80%;
            }
        }

        @media (min-width: 1024px) {
            .container {
                width: 70%;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Absensi Karyawan</h1>
        <div class="motivational-text">
            <p>Kehadiranmu Adalah Kunci Kesuksesan!</p>
            <p>Disiplin adalah langkah pertama menuju keberhasilan. Isi absensi harianmu, dan tunjukkan komitmenmu
                kepada dunia.</p>
        </div>
        <form action="{{ route('absensi.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal (DD-MM-YYYY)</label>
                <input type="text" name="tanggal" id="tanggal" placeholder="Masukkan tanggal (contoh: 31-12-2024)" required>
            </div>

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
                        <td><input type="radio" name="status_absensi" value="hadir" required></td>
                        <td><input type="radio" name="status_absensi" value="sakit"></td>
                        <td><input type="radio" name="status_absensi" value="izin"></td>
                    </tr>
                </tbody>
            </table>

            <button type="submit" class="btn-submit">Kirim Absensi</button>
            <div class="back">
                <a href="{{ url()->previous() }}" class="btn">Back</a>
            </div>
        </form>
    </div>
</body>

</html>
@endsection
