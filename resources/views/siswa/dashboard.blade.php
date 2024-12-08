<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Menyertakan file CSS eksternal untuk styling -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Menyertakan ikon dari Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>@yield('title', 'Dashboard')</title> <!-- Menampilkan title halaman yang dinamis -->
</head>

<body>
    <!-- Sidebar Navigasi -->
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <!-- Menampilkan logo gambar -->
                <span class="image">
                    <img src="{{ asset('storage/images/logo.jpeg') }}" alt="Logo" class="logo-img">
                </span>
                <div class="text header-text">
                    <!-- Menampilkan nama dan profesi -->
                    <span class="name">Monitoring PKL</span>
                    <span class="profession">Halaman Siswa</span>
                </div>
            </div>
        </header>

        <div class="menu-bar">
            <!-- Pemisah antara bagian header dan menu -->
            <div class="separator"></div>
            <!-- Daftar menu navigasi -->
            <ul class="menu-links">
                <!-- Menu Dashboard -->
                <li class="nav-link">
                    <a href="{{ route('siswa.content') }}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Menu Profil Siswa -->
                <li class="nav-link">
                    <a href="{{ route('siswa.profile') }}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Profil</span>
                    </a>
                </li>

                <!-- Menu Absensi Siswa -->
                <li class="nav-link">
                    <a href="{{ route('siswa.absensi') }}">
                        <i class='bx bx-calendar-check icon'></i>
                        <span class="text nav-text">Absensi Siswa</span>
                    </a>
                </li>

                <!-- Menu Laporan Siswa -->
                <li class="nav-link">
                    <a href="{{ route('siswa.laporan') }}">
                        <i class='bx bx-file icon'></i>
                        <span class="text nav-text">Laporan Siswa</span>
                    </a>
                </li>
            </ul>

            <!-- Bagian bawah sidebar untuk logout -->
            <div class="bottom-content">
                <li class="">
                    <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>
            </div>

            <!-- Form untuk logout (tersembunyi) -->
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf <!-- Token untuk proteksi CSRF -->
            </form>
        </div>
    </nav>

    <!-- Bagian konten utama halaman -->
    <section class="home">
        <!-- Konten halaman yang di-render melalui section 'content' -->
        @yield('content')
    </section>

    <!-- Menyertakan file JavaScript eksternal -->
    <script src="{{ asset('js/script.js') }}"></script>

</body>

</html>
