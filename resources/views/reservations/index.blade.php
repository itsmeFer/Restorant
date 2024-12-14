<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Reservasi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {
            border: 1px solid #ccc;
        }

        th, td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td {
            background-color: #f9f9f9;
        }

        td button, td a {
            padding: 8px 15px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        td button {
            background-color: #007bff;
            color: white;
            border: none;
        }

        td button:hover {
            background-color: #0056b3;
        }

        td a {
            background-color: #28a745;
            color: white;
            margin-left: 5px;
        }

        td a:hover {
            background-color: #218838;
        }

        td form button {
            background-color: #dc3545;
            color: white;
        }

        td form button:hover {
            background-color: #c82333;
        }

        .back-link {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .back-link:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            td button, td a {
                padding: 6px 12px;
                font-size: 12px;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <h1>Daftar Reservasi</h1>

    <a href="{{ route('menus.index') }}" class="back-link">← Kembali ke Menu</a>

    <div class="container">
        @if($reservations->isEmpty())
            <p>Belum ada reservasi.</p>
        @else
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nomor Meja</th>
                        <th>Daftar Pesanan</th>
                        <th>Jam Masuk</th>
                        <th>Jam Keluar</th>
                        <th>Status</th>
                        <th>Pembayaran</th>
                        <th>Atas Nama</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $key => $reservation)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $reservation->table->table_number ?? 'Meja Tidak Ditemukan' }}</td>
                            <td>
                                @foreach (json_decode($reservation->menus, true) as $menu)
                                    {{ $menu }}<br>
                                @endforeach
                            </td>
                            <td>{{ \Illuminate\Support\Carbon::parse($reservation->start_time)->locale('id')->translatedFormat('d F Y, H:i') }} WIB</td>
                            <td>
                                @if($reservation->end_time)
                                    {{ \Illuminate\Support\Carbon::parse($reservation->end_time)->locale('id')->translatedFormat('d F Y, H:i') }} WIB
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $reservation->status }}</td>
                            <td>{{ $reservation->payment_method ?? 'Tidak Ditentukan' }}</td>
                            <td>{{ $reservation->customer_name ?? 'Tidak Ditentukan' }}</td>

                            <!-- Kolom aksi -->
                            <td>
                                <form action="{{ route('reservations.complete', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">Selesai</button>
                                </form>

                                <a href="{{ route('reservations.edit', $reservation->id) }}">Edit</a>

                                <form action="{{ route('reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus reservasi ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>
</html>
