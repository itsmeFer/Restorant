<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rincian Pesanan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fc;
            color: #333;
            margin: 0;
            padding: 20px;
        }

        h1 {
            font-size: 32px;
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
        }

        h2, h3 {
            color: #007bff;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .error-message {
            color: red;
            font-size: 14px;
            margin-top: 5px;
        }

        .btn-primary {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: inline-block;
            margin-bottom: 20px;
            font-size: 16px;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            .btn-primary {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

    <h1>Rincian Pesanan</h1>
    <a href="{{ route('menus.index') }}" class="back-link">← Kembali ke Menu</a>

    <div class="container">
        <h2>Meja Nomor {{ $table->table_number }}</h2>
        <p>Kapasitas: {{ $table->capacity }} orang</p>

        <h3>Pesanan Anda:</h3>
        <ul>
            @foreach ($selectedMenus as $menu)
                <li>{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</li>
            @endforeach
        </ul>

        <p>Total Pesanan: Rp 
            @php 
                $total = $selectedMenus->sum('price');
            @endphp
            {{ number_format($total, 0, ',', '.') }}
        </p>

        <!-- Customer Name Input -->
        <div class="form-group">
            <label for="customer_name">Nama Pelanggan</label>
            <input type="text" id="customer_name" name="customer_name" class="form-control" required>
            @if ($errors->has('customer_name'))
                <div class="error-message">{{ $errors->first('customer_name') }}</div>
            @endif
        </div>

        <form id="reservation-form" action="{{ route('reservations.confirm') }}" method="POST">
    @csrf
    <input type="hidden" name="table_id" value="{{ $table->id }}">
    @foreach ($selectedMenus as $menu)
        <input type="hidden" name="menus[]" value="{{ $menu->id }}">
    @endforeach
    <!-- Tambahkan input untuk customer_name -->
    <input type="hidden" name="customer_name" id="hidden_customer_name">
    <button type="submit" class="btn-primary">Konfirmasi Reservasi</button>
</form>

<script>
    document.getElementById('reservation-form').addEventListener('submit', function(event) {
        var customerName = document.getElementById('customer_name').value.trim();
        if (customerName === '') {
            alert('Nama pelanggan harus diisi!');
            event.preventDefault(); // Prevent the form from submitting
        } else {
            document.getElementById('hidden_customer_name').value = customerName;
        }
    });
</script>


</body>
</html>
