<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function selectMenus()
    {
        // Menampilkan menu makanan dan minuman
        $foods = Menu::where('category', 'Makanan')->get();
        $drinks = Menu::where('category', 'Minuman')->get();
        
        return view('reservations.menus', compact('foods', 'drinks'));
    }

    public function selectTable()
    {
        // Logika untuk memilih meja (jika ada)
    }

    public function confirmReservation(Request $request)
    {
        // Logika untuk mengonfirmasi reservasi (jika ada)
    }
}
