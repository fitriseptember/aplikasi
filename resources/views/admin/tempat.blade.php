<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Metadata dan Styles -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat PKL</title>

    <!-- CSS Styling -->
    <style>
        /* Gaya umum untuk body dan tata letak halaman */
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(120deg, #a8d8ea, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 700px;
            margin: 0;
        }

        /* Styling untuk container utama */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Judul halaman */
        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }

        /* Styling untuk setiap grup form */
        .form-group {
            margin-bottom: 12px;
            text-align: left;
        }

        /* Styling label */
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }

        /* Input dan select styling */
        input[type="text"],
        select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: all 0.3s ease;
        }

        /* Tombol submit */
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 8px;
            background-color: #695CFE;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        /* Efek hover pada tombol */
        button[type="submit"]:hover {
            background-color: #8881d4;
            transform: scale(1.02);
        }

        /* Pesan error */
        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin: 12px 0;
            text-align: left;
        }

        /* Pesan sukses */
        .alert-success {
            color: #27ae60;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 18px;
            }
        }
    </style>

    <!-- Select2 Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
</head>
<body>
    @extends('admin.dashboard')

    @section('content')
    <div class="container">
        <h1>Tambah Tempat PKL</h1>

        <!-- Menampilkan error jika ada -->
        @if ($errors->any())
            <div class="error-message">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk menambah tempat PKL -->
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <!-- Input nama tempat PKL -->
            <div class="form-group">
                <label for="pkl_place">Nama Tempat PKL</label>
                <input type="text" name="pkl_place" id="pkl_place" placeholder="Masukkan nama tempat PKL" required>
            </div>

            <!-- Input alamat tempat PKL -->
            <div class="form-group">
                <label for="pkl_address">Alamat Tempat PKL</label>
                <input type="text" name="pkl_address" id="pkl_address" placeholder="Masukkan alamat tempat PKL" required>
            </div>

            <!-- Pilihan guru pembimbing -->
            <div class="form-group">
                <label for="pkl_teacher">Guru Pembimbing</label>
                <select name="pkl_teacher" id="pkl_teacher" required>
                    @foreach ($teachers as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan mentor tempat PKL -->
            <div class="form-group">
                <label for="pkl_mentor">Mentor Tempat PKL</label>
                <select name="pkl_mentor" id="pkl_mentor" required>
                    @foreach ($mentors as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Pilihan siswa PKL -->
            <div class="form-group">
                <label for="pkl_student">Siswa PKL</label>
                <select name="pkl_student[]" id="pkl_student" class="form-control" multiple required>
                    @foreach ($students as $id => $name)
                        <option value="{{ $id }}">{{ $name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tombol submit -->
            <button type="submit">Tambah Tempat PKL</button>
        </form>
    </div>
    @endsection

    <!-- Select2 dan jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 untuk pemilihan siswa
            $('#pkl_student').select2({
                placeholder: 'Pilih siswa PKL',
                allowClear: true
            });
        });
    </script>
</body>
</html>
