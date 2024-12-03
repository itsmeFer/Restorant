<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Restoran</title>
</head>
<body>
    <h1>Menu Restoran</h1>

    <h2>Makanan</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($foods as $food)
                <tr>
                    <td>{{ $food->name }}</td>
                    <td>{{ $food->category }}</td>
                    <td>Rp {{ number_format($food->price, 0, ',', '.') }}</td>
                    <td>{{ $food->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada makanan tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <h2>Minuman</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Deskripsi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drinks as $drink)
                <tr>
                    <td>{{ $drink->name }}</td>
                    <td>{{ $drink->category }}</td>
                    <td>Rp {{ number_format($drink->price, 0, ',', '.') }}</td>
                    <td>{{ $drink->description }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Belum ada minuman tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
