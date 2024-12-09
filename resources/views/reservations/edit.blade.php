<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservasi</title>
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
            max-width: 800px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        select, input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        select:focus, input[type="text"]:focus {
            border-color: #007bff;
            outline: none;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .back-link:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <h1>Edit Reservasi</h1>

    <a href="{{ route('reservations.index') }}" class="back-link">← Kembali ke Daftar Reservasi</a>

    <div class="container">
        <form action="{{ route('reservations.update', $reservation->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="table_id">Nomor Meja</label>
                <select name="table_id" id="table_id" required>
                    @foreach ($tables as $table)
                        <option value="{{ $table->id }}" {{ $reservation->table_id == $table->id ? 'selected' : '' }}>
                            Meja {{ $table->table_number }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="menus">Daftar Pesanan</label>
                <select name="menus[]" id="menus" multiple required>
                    @foreach ($menus as $menu)
                        <option value="{{ $menu->id }}" {{ in_array($menu->id, json_decode($reservation->menus, true) ?? []) ? 'selected' : '' }}>
                            {{ $menu->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status">
                    <option value="confirmed" {{ $reservation->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="completed" {{ $reservation->status == 'completed' ? 'selected' : '' }}>Completed</option>
                </select>
            </div>

            <div class="form-group">
                <label for="customer_name">Atas Nama</label>
                <input type="text" name="customer_name" id="customer_name" value="{{ $reservation->customer_name }}" required>
            </div>

            <button type="submit">Update Reservasi</button>
        </form>
    </div>

</body>
</html>
