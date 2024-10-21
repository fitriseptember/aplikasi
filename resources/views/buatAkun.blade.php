<!DOCTYPE html>
<html>

<head>
    <title>Formulir Pendaftaran Pengguna</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f0f0;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            margin: auto;
            transition: transform 0.3s;
        }

        form:hover {
            transform: scale(1.02);
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        textarea,
        select {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        textarea:focus,
        select:focus {
            border-color: #6c757d;
            outline: none;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        .gender-label {
            display: inline-block;
            margin-right: 15px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #6c757d;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            width: 100%;
            transition: background-color 0.3s;
            margin-top: 10px;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #5a6268;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #888;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
        }

        .button-container input {
            width: 48%;
        }
    </style>
</head>

<body>

    <h2>Buat Akun</h2>

    <form>
        <!-- Nama Lengkap -->
        <label for="fullname">Nama Lengkap:</label>
        <input type="text" id="fullname" name="fullname" required>

        <!-- Email -->
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <!-- Username -->
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <!-- Password -->
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <!-- Peran (dropdown) -->
        <label for="role">Peran:</label>
        <select id="role" name="role" required>
            <option value="student">Siswa</option>
            <option value="teacher">Guru</option>
            <option value="admin">Admin</option>
        </select>

        <!-- Jenis Kelamin (radio buttons) -->
        <label>Jenis Kelamin:</label>
        <label class="gender-label">
            <input type="radio" id="male" name="gender" value="male" required>
            Laki-laki
        </label>
        <label class="gender-label">
            <input type="radio" id="female" name="gender" value="female" required>
            Perempuan
        </label>

        <!-- Alamat -->
        <label for="address">Alamat:</label>
        <textarea id="address" name="address" rows="4" required></textarea>

        <!-- Tombol Kirim dan Batal -->
        <div class="button-container">
            <input type="submit" value="Kirim">
            <input type="button" value="Batal" onclick="window.location.href='/'">
        </div>

    </form>

</body>

</html>
