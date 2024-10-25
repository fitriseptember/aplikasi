<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Minimalist Profile Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Helvetica Neue', sans-serif;
        }

        body {
            background-color: #eaeaea;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-container {
            background-color: #f5f5f5;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0px 8px 24px rgba(0, 0, 0, 0.15);
            max-width: 500px;
            width: 100%;
            text-align: center;
        }

        .profile-picture {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
            border: 3px solid #d1d1d1;
        }

        .profile-name {
            font-size: 26px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-role {
            font-size: 16px;
            color: #777;
            margin-bottom: 30px;
        }

        .profile-details {
            text-align: left;
            padding: 0 20px;
            color: #555;
        }

        .profile-details p {
            font-size: 14px;
            margin-bottom: 10px;
        }

        .profile-actions {
            margin-top: 30px;
        }

        .profile-actions .btn {
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


.logout-btn {
    display: inline-block;
    background-color: #d9534f; /* Warna default untuk tombol lainnya */
    color: white;
    padding: 12px 25px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 14px;
    transition: background-color 0.3s ease;
    margin: 5px;
}

        .profile-actions .btn:hover {
            background-color: #555;
        }

        /* Pengaturan dengan tombol */
        .settings-actions {
            margin-top: 20px;
        }

        .settings-actions .btn-settings {
            background-color: #777;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 13px;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .settings-actions .btn-settings:hover {
            background-color: #999;
        }
    </style>
</head>

<body>

    <div class="profile-container">
        <!-- Profile Picture and Info -->
        <img src="mp.png" alt="Profile Picture" class="profile-picture">
        <h1 class="profile-name">John Doe</h1>
        <p class="profile-role">Admin</p>

        <!-- Detailed information -->
        <div class="profile-details">
            <p><strong>Email:</strong> john.doe@example.com</p>
            <p><strong>No. Telepon:</strong> +62 812 3456 7890</p>

        </div>

        <!-- Action buttons -->
        <div class="profile-actions">
            <a href="editprofileadmin.html" class="btn">Edit Profil</a>
            <a href="dashboradmin.html" class="btn">Back</a>
        </div>



</body>

</html>