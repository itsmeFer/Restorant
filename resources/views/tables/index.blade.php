<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Meja</title>
</head>
<body>
    <h1>Daftar Meja Restoran</h1>
    <table border="1">
        <thead>
            <tr>
                <th>Nomor Meja</th>
                <th>Kapasitas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tables as $table)
                <tr>
                    <td>{{ $table->table_number }}</td>
                    <td>{{ $table->capacity }}</td>
                    <td>{{ ucfirst($table->status) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
