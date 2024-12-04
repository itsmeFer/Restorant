@extends('layouts.app')

@section('content')
<h1 class="mb-4">Daftar Menu</h1>

<a href="#" class="btn btn-primary mb-3">Tambah Menu</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Deskripsi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($foods as $food)
            <tr>
                <td>{{ $food->name }}</td>
                <td>{{ $food->category }}</td>
                <td>Rp {{ number_format($food->price, 0, ',', '.') }}</td>
                <td>{{ $food->description }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada data makanan.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
