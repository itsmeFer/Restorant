@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="text-center">
        <h1 class="mb-4">Manajemen Restoran</h1>
        <div class="row justify-content-center">
            <div class="col-md-3">
                <a href="{{ route('menus.index') }}" class="btn btn-primary btn-lg w-100 mb-3">
                    <i class="bi bi-list"></i> Kelola Menu
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('tables.index') }}" class="btn btn-success btn-lg w-100 mb-3">
                    <i class="bi bi-table"></i> Kelola Meja
                </a>
            </div>
            <div class="col-md-3">
                <a href="{{ route('reservations.menus') }}" class="btn btn-warning btn-lg w-100">
                    <i class="bi bi-calendar-check"></i> Reservasi Meja
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
