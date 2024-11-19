<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>Dashboard Guru</title>
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="image.jpg" alt="logo">
                </span>
                <div class="text header-text">
                    <span class="name">Layout</span>
                    <span class="profession">Web Developer</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input type="search" placeholder="Search...">
            </li>

            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{ route('guru.content') }}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="#">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Profil</span>
                    </a>
                </li>
                <li class="nav-link">
                     <a href="{{ route('guru.dataAbsen') }}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Data Absen</span>
                    </a>
                </li>
                <li class="nav-link">
                     <a href="{{ route('guru.datadaftarsiswa') }}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Daftar Siswa</span>
                    </a>
                </li>
                <li class="nav-link">
                     <a href="{{ route('guru.dataLaporan') }}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Data Laporan Kegiatan</span>
                    </a>
                </li>
            </ul>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <section class="home">
        @yield('content')
    </section>

    <script src="script.js"></script>
     <script>
        // JavaScript to toggle the sidebar visibility
        const toggleButton = document.querySelector('.toggle');  // Button to toggle sidebar
        const sidebar = document.querySelector('.sidebar');  // Sidebar element

        toggleButton.addEventListener('click', () => {
            // Toggle the 'closed' class to show/hide the sidebar
            sidebar.classList.toggle('closed');
        });
    </script>
</body>

</html>
