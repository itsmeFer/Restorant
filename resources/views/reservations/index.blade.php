<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Reservasi</title>
</head>
<body>
    <h1>Daftar Reservasi</h1>

    <a href="{{ route('menus.index') }}" style="display: inline-block; margin-bottom: 10px; padding: 10px 20px; background-color: #007bff; color: white; text-decoration: none; border-radius: 5px;">
    ← Back to Menu
</a>


    @if ($reservations->isEmpty())
        <p>Tidak ada reservasi saat ini.</p>
    @else
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Meja</th>
                    <th>Status</th>
                    <th>Pesanan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $key => $reservation)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $reservation->table->table_number ?? 'Meja Tidak Ditemukan' }}</td>
                        <td>{{ $reservation->status }}</td>
                        <td>
                            @foreach (json_decode($reservation->menus, true) as $menu)
                                {{ $menu }}<br>
                            @endforeach
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
