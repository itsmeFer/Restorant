@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservasi Meja</h1>

    <form action="{{ route('reservations.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="table_id" class="form-label">Pilih Meja</label>
            <select name="table_id" id="table_id" class="form-select" required>
                <option value="">Pilih Meja</option>
                @foreach ($tables as $table)
                    <option value="{{ $table->id }}">
                        Meja {{ $table->table_number }} ({{ $table->capacity }} orang)
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="customer_name" class="form-label">Nama Pelanggan</label>
            <input type="text" name="customer_name" id="customer_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="reserved_at" class="form-label">Waktu Reservasi</label>
            <input type="datetime-local" name="reserved_at" id="reserved_at" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Reservasi</button>
    </form>
</div>
@endsection
