<html>
<head>
    <title>Print Editor</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 2rem; }
        .label { font-weight: bold; width: 150px; display: inline-block; }
        .value { display: inline-block; }
        .row { margin-bottom: 1rem; }
    </style>
    <script>
        window.onload = function() {
            window.print();
        };
    </script>
</head>
<body>
    <h2>Detail Editor</h2>
    <div class="row"><span class="label">Nama:</span> <span class="value">{{ $user->name }}</span></div>
    <div class="row"><span class="label">Email:</span> <span class="value">{{ $user->email }}</span></div>
    <div class="row"><span class="label">No. Telp:</span> <span class="value">{{ $user->phone }}</span></div>
    <div class="row"><span class="label">Status:</span> <span class="value">{{ $user->is_active ? 'Aktif' : 'Nonaktif' }}</span></div>
    <div class="row"><span class="label">Dibuat:</span> <span class="value">{{ $user->created_at ? $user->created_at->format('d-m-Y H:i') : '-' }}</span></div>
    <div class="row"><span class="label">Role:</span> <span class="value">Editor</span></div>
</body>
</html> 