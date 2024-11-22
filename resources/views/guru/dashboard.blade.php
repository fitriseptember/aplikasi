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
                    <img src="{{ asset('storage/images/logo.jpg') }}" alt="Logo" class="logo-img">
                </span>
                <div class="text header-text">
                    <span class="name">Layout</span>
                    <span class="profession">Web Developer</span>
                </div>
            </div>
            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <!-- Search Box -->
            <li class="search-box">
                <i class='bx bx-search icon'></i>
                <input id="search-input" type="search" placeholder="Search...">
            </li>

            <!-- Menu Links -->
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

    <script src="script.js"></script>
    <script>
        // JavaScript to toggle the sidebar visibility
        const toggleButton = document.querySelector('.toggle');
        const sidebar = document.querySelector('.sidebar');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('closed');
        });

        // Search functionality
        const searchInput = document.getElementById('search-input');
        const menuLinks = document.querySelectorAll('.menu-links .nav-link');

        searchInput.addEventListener('input', () => {
            const filter = searchInput.value.toLowerCase().trim(); // Ambil teks input dan trim spasi
            menuLinks.forEach(link => {
                const text = link.textContent.toLowerCase().trim(); // Ambil teks menu
                if (filter === '' || text.includes(filter)) {
                    link.style.display = ''; // Tampilkan jika cocok atau input kosong
                } else {
                    link.style.display = 'none'; // Sembunyikan jika tidak cocok
                }
            });
        });
    </script>
</body>

</html>
