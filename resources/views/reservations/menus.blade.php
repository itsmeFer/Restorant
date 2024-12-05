@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Pilih Menu</h1>
    <form action="{{ route('reservations.tables') }}" method="GET">
        <div class="row">
            @foreach ($menus as $menu)
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $menu->name }}</h5>
                            <p class="card-text">{{ $menu->description }}</p>
                            <p class="card-text">Rp {{ number_format($menu->price, 0, ',', '.') }}</p>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="menus[]" value="{{ $menu->id }}" id="menu-{{ $menu->id }}">
                                <label class="form-check-label" for="menu-{{ $menu->id }}">Pilih</label>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary mt-3">Pilih Meja</button>
    </form>
</div>
@endsection
