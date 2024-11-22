<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet">
    <title>Sidebar Menu</title>
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
                    <a href="{{ route('mitra.content') }}">
                        <i class='bx bx-home-alt icon'></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('mitra.dataAbsen') }}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Data Absen</span>
                    </a>
                </li>
                <li class="nav-link">
                    <a href="{{ route('mitra.datalaporan') }}">
                        <i class='bx bx-user icon'></i>
                        <span class="text nav-text">Data Laporan Kegiatan</span>
                    </a>
                </li>
            </ul>

            <!-- Logout Section -->
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

    <script>
        // Sidebar toggle functionality
        const toggleButton = document.querySelector('.toggle');
        const sidebar = document.querySelector('.sidebar');

        toggleButton.addEventListener('click', () => {
            sidebar.classList.toggle('closed');
        });

        // Search functionality
        const searchInput = document.getElementById('search-input'); // Get the search input
        const menuLinks = document.querySelectorAll('.menu-links .nav-link'); // Get all menu items

        searchInput.addEventListener('input', () => {
            const filter = searchInput.value.toLowerCase().trim(); // Get input value and trim spaces
            menuLinks.forEach(link => {
                const text = link.textContent.toLowerCase().trim(); // Get menu text
                if (filter === '' || text.includes(filter)) {
                    link.style.display = ''; // Show matching items or all if empty
                } else {
                    link.style.display = 'none'; // Hide non-matching items
                }
            });
        });
    </script>
</body>

</html>
