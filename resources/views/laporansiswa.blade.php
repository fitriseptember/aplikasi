<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kegiatan PKL</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            background-color: #f4f4f9;
            /* Warna latar belakang lebih cerah */
            color: #333;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .form-group div {
            flex: 1;
            margin-right: 10px;
        }

        .form-group div:last-child {
            margin-right: 0;
        }

        textarea {
            width: 95%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            resize: none;
            /* Mencegah perubahan ukuran textarea */
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="date"],
        select {
            margin-top: 5px;
            padding: 8px;
            width: calc(100% - 16px);
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: border-color 0.3s;
            /* Efek transisi border */
        }

        input[type="date"]:focus,
        select:focus {
            border-color: #7d7d7d;
            /* Border saat fokus */
            outline: none;
            /* Menghilangkan outline default */
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #777;
        }

        button {
            background-color: #6c757d;
            /* Warna abu-abu untuk tombol */
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
            transition: background-color 0.3s;
            /* Efek transisi untuk tombol */
            width: 100%;
            /* Tombol penuh lebar */
        }

        button:hover {
            background-color: #5a6268;
            /* Warna lebih gelap saat hover */
        }

        .confirmation {
            display: none;
            background-color: #d4edda;
            /* Warna latar belakang hijau muda */
            color: #155724;
            /* Warna teks hijau gelap */
            border: 1px solid #c3e6cb;
            /* Border hijau */
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            text-align: center;
        }

        .quote-container {
            background-color: #d0d6d0;
            /* Warna latar belakang untuk kolom */
            border-left: 5px solid #616161;
            /* Garis di sisi kiri */
            padding: 15px;
            margin: 20px 0;
            border-radius: 5px;
        }

        .quote {
            font-size: 1.5em;
            font-style: italic;
            color: #333;
            text-align: center;
            margin: 0;
        }

        .formal-text {
            font-size: 1em;
            margin-top: 10px;
            line-height: 1.5;
            text-align: justify;
            /* Rata kiri-kanan */
            color: #444;
        }

        .status {
            font-weight: bold;
            margin-top: 10px;
        }

        .status.pending {
            color: #ff0707;
            /* Warna kuning untuk pending */
        }

        .status.approved {
            color: #28a745;
            /* Warna hijau untuk disetujui */
        }

        img {
            max-width: 40%;
            border-radius: 10px;
            margin-top: 10px;
            display: none;
            /* Sembunyikan gambar hingga ditampilkan */
        }

        .back .btn {
            display: inline-block;
            padding: 10px 15px;
            color: white;
            background-color: #333;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
            font-size: 1.1em;
            margin-top: 15px;
            text-align: center;
        }

        .back .btn:hover {
            background-color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Laporan Harian</h1>

        <div class="quote-container">
            <div class="quote">Catatan Kegiatan Harian, Jalan Menuju Kesuksesan!</div>
            <p class="formal-text">
                Setiap langkah kecil yang Anda ambil hari ini membawa Anda lebih dekat ke impian Anda.
                Isi laporan harian Anda dengan dedikasi, dan biarkan semua orang melihat seberapa besar
                usaha yang telah Anda lakukan. Kegiatan harian ini tidak hanya sebagai catatan,
                tetapi juga sebagai cermin kemajuan yang dapat memotivasi Anda untuk terus melangkah maju.
            </p>
        </div>

        <div class="form-group">
            <div>
                <label for="date">Tanggal:</label>
                <input type="date" id="date" value="2024-10-22">
            </div>
            <div>
                <label for="day">Hari:</label>
                <select id="day">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
            </div>
        </div>

        <div class="activity">
            <h2>Kegiatan</h2>
            <textarea id="description" rows="4" placeholder="Tambahkan deskripsi kegiatan..."></textarea>
            <input type="file" id="fileInput" accept="image/*">
            <img id="preview" alt="Preview Foto">
            <button id="showImageBtn" onclick="previewImage()">Tampilkan Gambar</button>
            <button id="removeImageBtn" onclick="removeImage()" style="display: none;">Hapus Gambar</button>
        </div>

        <button onclick="submitReport()">Kirim Laporan</button>
        <div class="back">
            <a href="tampilan.html" class="btn">Back</a>
        </div>

        <div class="confirmation" id="confirmationMessage"></div>
        <div class="status pending" id="statusLabel">Status: Belum Disetujui</div> <!-- Label status laporan -->

        <footer>
            &copy; 2024 Laporan Kegiatan PKL
        </footer>
    </div>

    <script>
        function previewImage() {
            const fileInput = document.getElementById('fileInput');
            const preview = document.getElementById('preview');
            const removeImageBtn = document.getElementById('removeImageBtn');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    removeImageBtn.style.display = 'inline-block'; // Tampilkan tombol hapus
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        function removeImage() {
            const preview = document.getElementById('preview');
            const fileInput = document.getElementById('fileInput');
            const removeImageBtn = document.getElementById('removeImageBtn');

            preview.style.display = 'none'; // Sembunyikan gambar
            fileInput.value = ''; // Hapus input file
            removeImageBtn.style.display = 'none'; // Sembunyikan tombol hapus
        }

        function submitReport() {
            const description = document.getElementById('description').value;
            const fileInput = document.getElementById('fileInput');
            const date = document.getElementById('date').value;
            const day = document.getElementById('day').value;
            const confirmationMessage = document.getElementById('confirmationMessage');
            const statusLabel = document.getElementById('statusLabel');

            if (description === '' || fileInput.files.length === 0) {
                alert('Mohon lengkapi deskripsi dan unggah foto.');
                return;
            }

            confirmationMessage.textContent = `Laporan berhasil dikirim!\nTanggal: ${ date } \nHari: ${ day }`;
            confirmationMessage.style.display = 'block';
            confirmationMessage.scrollIntoView({ behavior: 'smooth' });

            // Ubah status menjadi disetujui
            statusLabel.classList.remove('pending');
            statusLabel.classList.add('approved');
            statusLabel.textContent = 'Status: Disetujui';
        }
    </script>
</body>

</html>
