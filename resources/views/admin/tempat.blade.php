<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tempat PKL</title>
    <style>
        body {
            font-family: 'Roboto', Arial, sans-serif;
            background: linear-gradient(120deg, #a8d8ea, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 700px;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 15px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            font-size: 22px;
            color: #333;
            margin-bottom: 15px;
            font-weight: bold;
            text-align: center;
        }

        .form-group {
            margin-bottom: 12px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
            font-weight: 600;
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
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

        button[type="submit"]:hover {
            background-color: #8881d4;
            transform: scale(1.02);
        }

        .error-message {
            color: #e74c3c;
            font-size: 14px;
            margin: 12px 0;
            text-align: left;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            h1 {
                font-size: 18px;
            }
        }
    </style>
    <script>
        function toggleAdditionalFields() {
            const roleSelect = document.getElementById('role');
            const partnerField = document.getElementById('partner-field');
            const teacherField = document.getElementById('teacher-field');

            if (roleSelect.value === 'siswa') {
                partnerField.style.display = 'block';
                teacherField.style.display = 'block';
            } else {
                partnerField.style.display = 'none';
                teacherField.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    @extends('admin.dashboard')

    @section('title', 'Absensi Siswa')

    @section('content')
        <div class="container">
            <h1>Tempat PKL</h1>
            @if ($errors->any())
                <div class="error-message">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="pkl-place">Nama Tempat PKL:</label>
                    <input type="text" id="pkl-place" name="pkl_place" placeholder="Masukkan Nama Tempat PKL" required>
                </div>

                <div class="form-group">
                    <label for="pkl-address">Alamat Tempat PKL:</label>
                    <input type="text" id="pkl-address" name="pkl_address" placeholder="Masukkan Alamat Tempat PKL" required>
                </div>

                <div class="form-group">
                    <label for="pkl-teacher">Guru Pembimbing:</label>
                    <select id="pkl-teacher" name="pkl_teacher" required>
                        <option value="Renra Noviana">Renra Noviana</option>
                        <option value="Asep Wahyudin">Asep Wahyudin</option>
                        <option value="Irlan Sugiharto">Irlan Sugiharto</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="pkl-mentor">Mentor Tempat PKL:</label>
                    <input type="text" id="pkl-mentor" name="pkl_mentor" placeholder="Masukkan Nama Mentor" required>
                </div>

                <div class="form-group">
                    <label for="pkl-student">Siswa PKL:</label>
                    <input type="text" id="pkl-student" name="pkl_student" placeholder="Masukkan Nama Siswa PKL" required>
                </div>


                <button type="submit">Tambah Akun</button>
            </form>
        </div>
    @endsection
</body>
</html>
