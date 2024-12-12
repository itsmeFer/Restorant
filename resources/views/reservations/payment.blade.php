<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konfirmasi Pembayaran</title>
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
            max-width: 600px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        select, button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }

        button {
            background-color: #007bff;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
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
            .container {
                padding: 15px;
            }

            select, button {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>

    <a href="{{ route('reservations.index') }}" class="back-link">← Kembali ke Daftar Reservasi</a>

    <div class="container">
        <h1>Konfirmasi Pembayaran</h1>
        <form action="{{ route('reservations.processPayment', ['reservation' => $reservation->id]) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="payment_method">Metode Pembayaran</label>
                <select name="payment_method" id="payment_method">
                    <option value="cash" {{ old('payment_method', $reservation->payment_method) == 'cash' ? 'selected' : '' }}>Cash</option>
                    <option value="qris" {{ old('payment_method', $reservation->payment_method) == 'qris' ? 'selected' : '' }}>QRIS</option>
                    <option value="kartu" {{ old('payment_method', $reservation->payment_method) == 'kartu' ? 'selected' : '' }}>Kartu</option>
                </select>
            </div>

            <button type="submit">Konfirmasi Pembayaran</button>
        </form>
    </div>

</body>
</html>
