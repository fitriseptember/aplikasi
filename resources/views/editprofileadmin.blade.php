<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Profil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Helvetica Neue', sans-serif;
        }

        body {
             background-color: #f0f0f0;
            background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .edit-container {
            background-color: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.15);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            color: #555;
            margin-bottom: 5px;
        }

        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="tel"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d1d1;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        .form-group input:focus {
            border-color: #333;
            outline: none;
        }

        .profile-picture {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
            border: 3px solid #d1d1d1;
        }

        .btn-sve {
    display: inline-block;
    padding: 10px 15px;
    color: white; /* Sesuaikan warna teks */
    background-color: #333; /* Contoh warna merah */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-sve:hover {
    background-color: #555; /* Warna saat hover */
}


        .btn-cancel {
    display: inline-block;
    padding: 10px 15px;
    color: white; /* Sesuaikan warna teks */
    background-color: #f44336; /* Contoh warna merah */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.btn-cancel:hover {
    background-color: #d32f2f; /* Warna saat hover */
}

    </style>
</head>

<body>

    <div class="edit-container">
        <h1>Edit Profil</h1>

        <!-- Current Profile Picture -->
        <img src="https://via.placeholder.com/100" alt="Current Profile Picture" class="profile-picture">

        <form>
            <div class="form-group">
                <label for="photo">Ganti Foto Profil</label>
                <input type="file" id="photo" accept="image/*" required>
            </div>
            <div class="form-group">
                <label for="name">Nama Lengkap</label>
                <input type="text" id="name" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Masukkan email" required>
            </div>
            <div class="form-group">
                <label for="phone">No. Telepon</label>
                <input type="tel" id="phone" placeholder="Masukkan nomor telepon" required>
            </div>
            <a href="profileadmin.html" class="btn-sve">Simpan Perubahan</a>
            <a href="profileadmin.html" class="btn-cancel">Batal</a>

        </form>
    </div>

</body>

</html>