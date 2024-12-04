@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="text-center">Manajemen Restoran</h1>
        <div class="text-center mt-4">
            <a href="{{ route('menus.index') }}" class="btn btn-primary btn-lg">Kelola Menu</a>
            <a href="{{ route('tables.index') }}" class="btn btn-success btn-lg">Kelola Meja</a>
            <a href="#" class="btn btn-warning btn-lg">Kelola Reservasi</a>
        </div>
    </div>
</div>
@endsection
