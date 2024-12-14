<!DOCTYPE html>
<html>
<head>
    <title>Data Akun</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f4f4f4;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Daftar Akun</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Role</th>
                <th>Gender</th>
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($accounts as $index => $account)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $account->role }}</td>
                    <td>{{ $account->gender }}</td>
                    <td>{{ $account->nama_lengkap }}</td>
                    <td>{{ $account->username }}</td>
                    <td>{{ $account->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
