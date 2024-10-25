<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            padding: 20px;
            animation: fadeIn 1s ease;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #444;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px 15px;
            border: 1px solid #ddd;
            text-align: center;
        }

        th {
            background-color: #f8f8f8;
            color: #333;
            font-weight: bold;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 20px;
        }


        input[type="text"],
        select {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #e74c3c;
        }

        .btn-delete:hover {
            background-color: #c0392b;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Data Guru</h1>

        <!-- Tabel untuk menampilkan data guru -->
        <table id="guruTable">
            <tr>
                <th>Nama Guru</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </table>

        <!-- Tombol kembali -->
        <a class="btn" href="javascript:history.back()">Kembali</a>
    </div>

    <script>
        const guruTable = document.getElementById('guruTable');
        const btnAdd = document.getElementById('btn-add');
        let editIndex = -1;

        // Fungsi untuk menambahkan atau memperbarui data guru
        btnAdd.addEventListener('click', function () {
            const nama = document.getElementById('nama').value;
            const gender = document.getElementById('gender').value;

            if (nama && gender) {
                if (editIndex === -1) {
                    const row = guruTable.insertRow(guruTable.rows.length);
                    row.insertCell(0).innerText = nama;
                    row.insertCell(1).innerText = gender;
                    const cellAksi = row.insertCell(2);
                    cellAksi.innerHTML = `<button class="btn btn-delete" onclick="deleteGuru(this)">Hapus</button>
                                          <button class="btn" onclick="editGuru(this)">Edit</button>`;
                } else {
                    const row = guruTable.rows[editIndex];
                    row.cells[0].innerText = nama;
                    row.cells[1].innerText = gender;
                    editIndex = -1; // Reset edit index
                    btnAdd.innerText = 'Tambah Guru'; // Reset button text
                }
                document.getElementById('nama').value = '';
                document.getElementById('gender').value = '';
            } else {
                alert('Silakan lengkapi semua field!');
            }
        });

        // Fungsi untuk mengedit data guru
        function editGuru(button) {
            const row = button.parentElement.parentElement;
            document.getElementById('nama').value = row.cells[0].innerText;
            document.getElementById('gender').value = row.cells[1].innerText;
            editIndex = row.rowIndex; // Set index for editing
            btnAdd.innerText = 'Perbarui Guru'; // Change button text
        }

        // Fungsi untuk menghapus data guru
        function deleteGuru(button) {
            const row = button.parentElement.parentElement;
            guruTable.deleteRow(row.rowIndex);
        }
    </script>
</body>

</html>
