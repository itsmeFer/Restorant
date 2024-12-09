<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Menu</title>
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
            font-size: 32px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 24px;
            font-weight: 600;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-check {
            margin-bottom: 15px;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .form-check-label {
            font-size: 16px;
            color: #555;
        }

        .form-check-label:hover {
            color: #007bff;
            cursor: pointer;
        }

        .btn-primary {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #007bff;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 24px;
            }
            h2 {
                font-size: 20px;
            }
            .btn-primary {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

    <h1>Pilih Menu</h1>

    <div class="container">
        
        <form action="{{ route('reservations.selectTable') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Kolom Makanan -->
                <div class="col-md-6">
                    <h2 class="mb-4" style="color: #007bff;">Makanan</h2>
                    @foreach ($foods as $food)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $food->id }}" id="menu-{{ $food->id }}">
                            <label class="form-check-label" for="menu-{{ $food->id }}">
                                {{ $food->name }} - Rp {{ number_format($food->price, 0, ',', '.') }}
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- Kolom Minuman -->
                <div class="col-md-6">
                    <h2 class="mb-4" style="color: #28a745;">Minuman</h2>
                    @foreach ($drinks as $drink)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $drink->id }}" id="menu-{{ $drink->id }}">
                            <label class="form-check-label" for="menu-{{ $drink->id }}">
                                {{ $drink->name }} - Rp {{ number_format($drink->price, 0, ',', '.') }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            
            <button type="submit" class="btn-primary mt-3">Lanjutkan ke Pilih Meja</button>
        </form>
    </div>

</body>
</html>
