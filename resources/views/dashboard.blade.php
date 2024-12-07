@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Pilih Meja</h1>

    <form action="{{ route('reservations.confirm') }}" method="POST">
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
        <button type="submit" class="btn btn-success mt-3">Konfirmasi Reservasi</button>
    </form>
</div>
@endsection
