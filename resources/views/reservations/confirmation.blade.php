@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Konfirmasi Reservasi</h1>
    <h3>Menu yang Dipilih:</h3>
    <ul>
        @foreach ($selectedMenus as $menuId)
            @php
                $menu = \App\Models\Menu::find($menuId);
            @endphp
            <li>{{ $menu->name }} - Rp {{ number_format($menu->price, 0, ',', '.') }}</li>
        @endforeach
    </ul>

    <h3>Meja yang Dipilih:</h3>
    <p>Meja Nomor: {{ $tableId }}</p>

    <a href="{{ route('dashboard') }}" class="btn btn-primary">Selesai</a>
</div>
@endsection
