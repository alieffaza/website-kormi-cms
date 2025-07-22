<html>
<head>
    <title>Print Daftar Editor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        table { width: 100%; border-collapse: collapse; margin-top: 2rem; }
        th, td { border: 1px solid #888; padding: 8px 12px; text-align: left; }
        th { background: #f5f6fa; }
        .text-center { text-align: center; }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>
<body>
    <h2>Daftar Editor</h2>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No. Telp</th>
                <th>Status</th>
                <th>Dibuat</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone ?? '-' }}</td>
                <td>{{ $user->is_active ? 'Aktif' : 'Nonaktif' }}</td>
                <td>{{ $user->created_at ? $user->created_at->format('d-m-Y H:i') : '-' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html> 