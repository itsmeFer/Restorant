@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Pilih Menu</h1>

    <form action="{{ route('reservations.selectTable') }}" method="POST">
        @csrf
        <div class="row">
            <!-- Kolom Makanan -->
            <div class="col-md-6">
                <h2 class="mb-4">Makanan</h2>
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
                <h2 class="mb-4">Minuman</h2>
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
        <button type="submit" class="btn btn-primary mt-3">Lanjutkan ke Pilih Meja</button>
    </form>
</div>
@endsection
