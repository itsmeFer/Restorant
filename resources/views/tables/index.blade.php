@extends('layouts.app')

@section('content')
<h1 class="mb-4">Daftar Meja</h1>

<a href="#" class="btn btn-primary mb-3">Tambah Meja</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nomor Meja</th>
            <th>Kapasitas</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($tables as $table)
            <tr>
                <td>{{ $table->table_number }}</td>
                <td>{{ $table->capacity }}</td>
                <td>
                    <span class="badge bg-{{ $table->status == 'available' ? 'success' : 'danger' }}">
                        {{ ucfirst($table->status) }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="text-center">Belum ada data meja.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
