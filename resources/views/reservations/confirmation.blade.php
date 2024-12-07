@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Rincian Pesanan</h1>

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

    <form action="{{ route('reservations.confirm') }}" method="POST">
        @csrf
        <input type="hidden" name="table_id" value="{{ $table->id }}">
        @foreach ($selectedMenus as $menu)
            <input type="hidden" name="menus[]" value="{{ $menu->id }}">
        @endforeach
        <button type="submit" class="btn btn-primary">Konfirmasi Reservasi</button>
    </form>
</div>
@endsection
