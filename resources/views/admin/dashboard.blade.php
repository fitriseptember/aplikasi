<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>@yield('title', 'Sidebar Menu')</title>
</head>

<body>
    <nav class="sidebar">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="{{ asset('mp.png') }}" alt="logo">
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
    <input type="search" id="search-input" placeholder="Search...">
</li>


            <ul class="menu-links">
    <li class="nav-link">
        <a href="{{ route('admin.content') }}">
            <i class='bx bx-home-alt icon'></i>
            <span class="text nav-text">Dashboard</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('admin.create') }}">
            <i class='bx bx-user icon'></i>
            <span class="text nav-text">Input akun</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('admin.list') }}">
            <i class='bx bx-user icon'></i>
            <span class="text nav-text">Daftar Akun</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('admin.dataAbsen') }}">
            <i class='bx bx-calendar-check icon'></i>
            <span class="text nav-text">Absensi Siswa</span>
        </a>
    </li>
    <li class="nav-link">
        <a href="{{ route('admin.dataLaporan') }}">
            <i class='bx bx-file icon'></i>
            <span class="text nav-text">Laporan Siswa</span>
        </a>
    </li>
</ul>

            <div class="bottom-content">
    <li class="">
        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class='bx bx-log-out icon'></i>
            <span class="text nav-text">Logout</span>
        </a>
    </li>
</div>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
</div>
        </div>
    </nav>

    <section class="home">
        @yield('content')
    </section>

    <script src="{{ asset('js/script.js') }}"></script>
     <script>
        // JavaScript to toggle the sidebar visibility
        const toggleButton = document.querySelector('.toggle');  // Button to toggle sidebar
        const sidebar = document.querySelector('.sidebar');  // Sidebar element

        toggleButton.addEventListener('click', () => {
            // Toggle the 'closed' class to show/hide the sidebar
            sidebar.classList.toggle('closed');
        });


      const searchInput = document.getElementById('search-input'); // Ambil elemen input
const menuLinks = document.querySelectorAll('.menu-links .nav-link'); // Ambil semua elemen menu (dalam <li>)

searchInput.addEventListener('input', () => {
    const filter = searchInput.value.toLowerCase().trim(); // Ambil teks input dan trim spasi
    menuLinks.forEach(link => {
        const text = link.textContent.toLowerCase().trim(); // Ambil teks menu
        if (text.includes(filter) && filter !== '') {
            link.style.display = ''; // Tampilkan jika cocok
        } else {
            link.style.display = 'none'; // Sembunyikan jika tidak cocok
        }
    });

    // Jika input kosong, tampilkan semua elemen
    if (filter === '') {
        menuLinks.forEach(link => link.style.display = '');
    }
});

    </script>
</body>

</html>
