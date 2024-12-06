@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Menu</h1>

    <div class="row">
        <!-- Kolom Makanan -->
        <div class="col-md-6">
            <h2 class="mb-4">Makanan</h2>
            <div class="row">
                @forelse ($foods as $food)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $food->name }}</h5>
                                <p class="card-text">{{ $food->description }}</p>
                                <p class="card-text">Rp {{ number_format($food->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada makanan tersedia.</p>
                @endforelse
            </div>
        </div>

        <!-- Kolom Minuman -->
        <div class="col-md-6">
            <h2 class="mb-4">Minuman</h2>
            <div class="row">
                @forelse ($drinks as $drink)
                    <div class="col-md-6 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $drink->name }}</h5>
                                <p class="card-text">{{ $drink->description }}</p>
                                <p class="card-text">Rp {{ number_format($drink->price, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-muted">Tidak ada minuman tersedia.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
