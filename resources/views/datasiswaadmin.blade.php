<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
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
        select,
        input[type="password"] {
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
        <h1>Data Siswa</h1>

        

        <table id="studentTable">
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </table>

        <h1>Absensi Siswa</h1>
        
        <table id="attendanceTable">
            <tr>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <tbody id="attendanceList"></tbody>
        </table>

        <h1>Laporan Kegiatan Siswa</h1>
        

        <table id="reportTable">
            <tr>
                <th>Tanggal</th>
                <th>Hari</th>
                <th>Deskripsi</th>
                <th>Foto</th>
                <th>Aksi</th>
            </tr>
            <tbody id="reportList"></tbody>
        </table>

        <a class="btn" href="javascript:history.back()">Kembali</a>
    </div>

    <script>
        const studentTable = document.getElementById('studentTable');
        const attendanceTable = document.getElementById('attendanceTable');
        const reportTable = document.getElementById('reportTable');

        let studentEditIndex = -1;
        let attendanceEditIndex = -1;
        let reportEditIndex = -1;

        // Function to handle student CRUD
        document.getElementById('btn-add-student').addEventListener('click', function () {
            const username = document.getElementById('username').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const gender = document.getElementById('gender').value;

            if (username && email && password && gender) {
                if (studentEditIndex === -1) {
                    const row = studentTable.insertRow(studentTable.rows.length);
                    row.insertCell(0).innerText = username;
                    row.insertCell(1).innerText = email;
                    row.insertCell(2).innerText = password;
                    row.insertCell(3).innerText = gender;
                    const cellAksi = row.insertCell(4);
                    cellAksi.innerHTML = `<button class="btn btn-delete" onclick="deleteStudent(this)">Hapus</button>
                                          <button class="btn" onclick="editStudent(this)">Edit</button>`;
                } else {
                    const row = studentTable.rows[studentEditIndex];
                    row.cells[0].innerText = username;
                    row.cells[1].innerText = email;
                    row.cells[2].innerText = password;
                    row.cells[3].innerText = gender;
                    studentEditIndex = -1; // Reset edit index
                }
                clearStudentInputs();
            } else {
                alert('Silakan lengkapi semua field!');
            }
        });

        function editStudent(button) {
            const row = button.parentElement.parentElement;
            document.getElementById('username').value = row.cells[0].innerText;
            document.getElementById('email').value = row.cells[1].innerText;
            document.getElementById('password').value = row.cells[2].innerText;
            document.getElementById('gender').value = row.cells[3].innerText;
            studentEditIndex = row.rowIndex; // Set index for editing
        }

        function deleteStudent(button) {
            const row = button.parentElement.parentElement;
            studentTable.deleteRow(row.rowIndex);
        }

        // Function to handle attendance CRUD
        document.getElementById('btn-add-attendance').addEventListener('click', function () {
            const date = document.getElementById('attendanceDate').value;
            const studentName = document.getElementById('studentName').value;
            const status = document.getElementById('attendanceStatus').value;

            if (date && studentName && status) {
                if (attendanceEditIndex === -1) {
                    const row = attendanceTable.insertRow(attendanceTable.rows.length);
                    row.insertCell(0).innerText = date;
                    row.insertCell(1).innerText = studentName;
                    row.insertCell(2).innerText = status;
                    const cellAksi = row.insertCell(3);
                    cellAksi.innerHTML = `<button class="btn btn-delete" onclick="deleteAttendance(this)">Hapus</button>
                                          <button class="btn" onclick="editAttendance(this)">Edit</button>`;
                } else {
                    const row = attendanceTable.rows[attendanceEditIndex];
                    row.cells[0].innerText = date;
                    row.cells[1].innerText = studentName;
                    row.cells[2].innerText = status;
                    attendanceEditIndex = -1; // Reset edit index
                }
                clearAttendanceInputs();
            } else {
                alert('Silakan lengkapi semua field!');
            }
        });

        function editAttendance(button) {
            const row = button.parentElement.parentElement;
            document.getElementById('attendanceDate').value = row.cells[0].innerText;
            document.getElementById('studentName').value = row.cells[1].innerText;
            document.getElementById('attendanceStatus').value = row.cells[2].innerText;
            attendanceEditIndex = row.rowIndex; // Set index for editing
        }

        function deleteAttendance(button) {
            const row = button.parentElement.parentElement;
            attendanceTable.deleteRow(row.rowIndex);
        }

        // Function to handle report CRUD
        document.getElementById('btn-add-report').addEventListener('click', function () {
            const date = document.getElementById('reportDate').value;
            const day = document.getElementById('reportDay').value;
            const description = document.getElementById('reportDescription').value;
            const photo = document.getElementById('reportPhoto').value;

            if (date && day && description && photo) {
                if (reportEditIndex === -1) {
                    const row = reportTable.insertRow(reportTable.rows.length);
                    row.insertCell(0).innerText = date;
                    row.insertCell(1).innerText = day;
                    row.insertCell(2).innerText = description;
                    row.insertCell(3).innerHTML = `<img src="${photo}" alt="Foto Kegiatan" width="100">`;
                    const cellAksi = row.insertCell(4);
                    cellAksi.innerHTML = `<button class="btn btn-delete" onclick="deleteReport(this)">Hapus</button>
                                          <button class="btn" onclick="editReport(this)">Edit</button>`;
                } else {
                    const row = reportTable.rows[reportEditIndex];
                    row.cells[0].innerText = date;
                    row.cells[1].innerText = day;
                    row.cells[2].innerText = description;
                    row.cells[3].innerHTML = `<img src="${photo}" alt="Foto Kegiatan" width="100">`;
                    reportEditIndex = -1; // Reset edit index
                }
                clearReportInputs();
            } else {
                alert('Silakan lengkapi semua field!');
            }
        });

        function editReport(button) {
            const row = button.parentElement.parentElement;
            document.getElementById('reportDate').value = row.cells[0].innerText;
            document.getElementById('reportDay').value = row.cells[1].innerText;
            document.getElementById('reportDescription').value = row.cells[2].innerText;
            document.getElementById('reportPhoto').value = row.cells[3].querySelector('img').src;
            reportEditIndex = row.rowIndex; // Set index for editing
        }

        function deleteReport(button) {
            const row = button.parentElement.parentElement;
            reportTable.deleteRow(row.rowIndex);
        }

        function clearStudentInputs() {
            document.getElementById('username').value = '';
            document.getElementById('email').value = '';
            document.getElementById('password').value = '';
            document.getElementById('gender').value = '';
        }

        function clearAttendanceInputs() {
            document.getElementById('attendanceDate').value = '';
            document.getElementById('studentName').value = '';
            document.getElementById('attendanceStatus').value = '';
        }

        function clearReportInputs() {
            document.getElementById('reportDate').value = '';
            document.getElementById('reportDay').value = '';
            document.getElementById('reportDescription').value = '';
            document.getElementById('reportPhoto').value = '';
        }
    </script>
</body>

</html>
