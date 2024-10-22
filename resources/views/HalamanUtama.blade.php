<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<style>
body {
    font-family: 'Arial', sans-serif;
    line-height: 1.6;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/* Smooth Scroll */
html {
    scroll-behavior: smooth;
}


/* Header */
header {
    background-color: black;
    color: white;
    padding: 15px;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 1000;
}

nav {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.logo {
    width: 80px;
    border-radius: 50%;
    margin-left: 20px;
}

nav ul {
    list-style: none;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: white;
    margin-right: 30px;
    text-decoration: none;
    font-size: 1.2rem;
}

nav ul li a:hover {
    color: grey;
}


/* Home */
#home {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: 	#808080;
    background-image: url('https://www.transparenttextures.com/patterns/cubes.png');
    display: flex;
    justify-content: center;
    align-items: center;
    height: 60vh;
    color: #333;
    animation: moveBackground 20s linear infinite;
}

 @keyframes moveBackground {
    0% {
        background-position: 0% 0%;
    }
    00% {
        background-position: 100% 100%;
    }
    }

.home-content {
    max-width: 100%;

}

.home-content h1 {
     font-size: 6rem;
    color: black;
    text-align: center;
    margin: 20px 0;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-family: 'Arial', sans-serif;
    text-shadow: 2px 2px 4px rgba(241, 232, 232, 0.452);
}

.home-content h2 {
    font-size: 2rem;
    color: black;
    text-align: center;
    margin: 10px 0;
    font-family: 'Arial', sans-serif;
    border-bottom: 2px solid lightgray;
    padding-bottom: 10px;
}

.button {
    font-family: 'Arial', sans-serif;
    font-size: 1em;
    padding: 10px 20px;
    color: #000000;
    background-color: lightgray;
    text-decoration: none;
    border-radius: 20px;
    cursor: pointer;
    margin-bottom: 80px;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: gray;
}

.home-image img {
    max-width: 350px;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

@media (max-width: 768px) {
    #home {
        flex-direction: column;
        text-align: center;
    }

    .home-content,
    .home-image {
        max-width: 100%;
    }

    .home-image img {
        max-width: 100%;
    }
}


/* About */
#about {
    padding: 150px;
    background-color: white;
}

.about-container {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-wrap: wrap;
    gap: 30px;
    max-width: 800px;
    margin: 0 auto;
}

.profile-img {
    width: 300px;
    height: 300px;
}

.about-text {
    flex: 1;
}

.about-text h1 {
    font-size: 3em;
    color: black;
}

.about-text p {
    line-height: 1.5;
    font-size: 1em;
    color: black;
    text-align: justify;
}

.about-text h2 {
    font-size: 1em;
    margin-bottom: 10px;
    color: black;
    text-align: left;
}

/* Social Links */
.social-links {
    display: flex;
    justify-content: center;
}

.social-links a {
    color: gray;
    font-size: 1.5rem;
    margin: 0 10px;
    transition: color 0.3s;
}

.social-links a:hover {
    color: black;
}

.about-content button {
    font-family: 'Arial', sans-serif;
    font-size: 1em;
    padding: 10px 20px;
    color: black;
    background-color: lightgray;
    text-decoration: none;
    border-radius: 20px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.button:hover {
    background-color: gray;
}


/* Footer */
footer {
    font-size: 0.7rem;
    text-align: center;
    padding: 20px;
    background-color: black;
    color: #fff;
}

</style>

<body>


    <!-- Navbar -->
    <header>
        <nav>
            <img src="logoMP.jpeg" alt="Logo" class="logo">
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
            </ul>
        </nav>
    </header>


    <!-- Home -->
    <section id="home">
        <div class="home-content">
            <h1>Monipkl</h1>
            <h2>Selamat datang di Sistem Monitoring Praktik Kerja Lapangan (PKL)</h2>
            <a href="#about" class="button">Selanjutnya</a>
        </div>
    </section>


    <!-- About -->
    <section id="about">
        <div class="about-container">
            <img src="people.png" alt="Profile Picture" class="profile-img">
            <div class="about-text">
                <h1>Tentang Aplikasi</h1>
                <p>Sistem Monitoring Praktik Kerja Lapangan (PKL), sebuah platform yang dirancang untuk mempermudah
                pengelolaan dan pemantauan kegiatan PKL siswa secara efektif. Sistem ini,

                <b>memungkinkan:</b>

                Siswa untuk melaporkan progres harian, mengisi absensi, serta mengunggah laporan PKL.
                Guru untuk memantau kegiatan PKL siswa secara real-time, memberikan bimbingan, serta melakukan penilaian akhir.
                Mitra Perusahaan untuk mengevaluasi kinerja siswa, memberikan umpan balik, serta mengelola kehadiran dan tugas siswa
                selama PKL.</p>
                <h2>Apakah anda ingin bergabung?</h2>

                <!-- Login disini -->
                <div class="about-content">
                    <a href="#home" class="button">Klik Disini</a>
                </div>

                <div class="social-links">
                    <a href="https://www.instagram.com/thewebguild_a" target="_blank">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="https://github.com/fitriseptember/monitoring_pkl" target="_blank">
                        <i class="fa-brands fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <footer>
        <p>&copy; © 2024 by kel A. All rights reserved.</p>
    </footer>

</body>

</html>
