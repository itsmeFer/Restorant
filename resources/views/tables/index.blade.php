<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Meja</title>
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

        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            background-color: #f9f9f9;
            text-align: center;
        }

        .card-title {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 10px;
        }

        .card-text {
            font-size: 16px;
            margin-bottom: 15px;
        }

        .form-check {
            margin-top: 10px;
        }

        .form-check-input {
            margin-right: 10px;
        }

        .form-check-label {
            font-size: 16px;
            color: #555;
        }

        .btn-success {
            font-size: 16px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
            .card-title {
                font-size: 18px;
            }
            .card-text {
                font-size: 14px;
            }
            .btn-success {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>

    <h1>Pilih Meja</h1>

    <div class="container">
        
        <form action="{{ route('tables.select') }}" method="POST">
            @csrf
            @foreach ($selectedMenus as $menuId)
                <input type="hidden" name="menus[]" value="{{ $menuId }}">
            @endforeach
            <div class="row">
                @foreach ($tables as $table)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Meja Nomor {{ $table->table_number }}</h5>
                                <p class="card-text">Kapasitas: {{ $table->capacity }} orang</p>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="table_id" value="{{ $table->id }}" id="table-{{ $table->id }}">
                                    <label class="form-check-label" for="table-{{ $table->id }}">Pilih</label>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn-success mt-3">Konfirmasi Reservasi</button>
           
            <button type="submit"> <a href="{{ route('menus.index') }}" class="back-link">Kembali ke Menu</a></button>
        </form>
    </div>

</body>
</html>
