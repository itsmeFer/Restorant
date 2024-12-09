@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4" style="font-size: 32px; font-weight: bold; color: #333;">Pilih Menu</h1>

    <form action="{{ route('reservations.selectTable') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Kolom Makanan -->
            <div class="col-md-6">
                <h2 class="mb-4" style="font-size: 24px; font-weight: 600; color: #007bff;">Makanan</h2>
                @foreach ($foods as $food)
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $food->id }}" id="menu-{{ $food->id }}">
                        <label class="form-check-label" for="menu-{{ $food->id }}" style="font-size: 16px; color: #555;">
                            {{ $food->name }} - Rp {{ number_format($food->price, 0, ',', '.') }}
                        </label>
                    </div>
                @endforeach
            </div>

            <!-- Kolom Minuman -->
            <div class="col-md-6">
                <h2 class="mb-4" style="font-size: 24px; font-weight: 600; color: #28a745;">Minuman</h2>
                @foreach ($drinks as $drink)
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $drink->id }}" id="menu-{{ $drink->id }}">
                        <label class="form-check-label" for="menu-{{ $drink->id }}" style="font-size: 16px; color: #555;">
                            {{ $drink->name }} - Rp {{ number_format($drink->price, 0, ',', '.') }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary mt-3" style="font-size: 16px; padding: 10px 20px; background-color: #007bff; border-radius: 5px; border: none; transition: background-color 0.3s;">Lanjutkan ke Pilih Meja</button>
    </form>
</div>

<!-- CSS untuk tambahan hover efek -->
<style>
    .form-check-label {
        transition: color 0.3s ease;
    }

    .form-check-label:hover {
        color: #007bff;
        cursor: pointer;
    }

    .form-check-input:checked + .form-check-label {
        font-weight: bold;
        color: #28a745;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }
</style>
@endsection
