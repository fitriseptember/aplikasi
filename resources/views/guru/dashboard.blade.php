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
                    <img src="{{ asset('storage/images/logo.jpeg') }}" alt="Logo" class="logo-img">
                </span>
                <div class="text header-text">
                    <span class="name">Monitoring PKL</span>
                    <span class="profession">Halaman Guru</span>
                </div>
            </div>

        </header>

        <div class="menu-bar">
             <div class="separator"></div>
            <!-- Removed the search box -->

            <!-- Menu Links -->
            <ul class="menu-links">
                <li class="nav-link">
                    <a href="{{ route('guru.content') }}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
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

            <!-- Logout -->
            <div class="bottom-content">
                <li class="nav-link">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>

            <!-- Hidden Logout Form -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </nav>

    <section class="home">
        @yield('content')
    </section>

       <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
