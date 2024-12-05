<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function selectMenus()
    {
        $menus = Menu::all();
        return view('reservations.menus', compact('menus'));
    }

    public function selectTable(Request $request)
    {
        $selectedMenus = $request->input('menus', []);
        $tables = Table::where('status', 'available')->get();
        return view('reservations.tables', compact('selectedMenus', 'tables'));
    }

    public function confirmReservation(Request $request)
    {
        $selectedMenus = $request->input('menus');
        $tableId = $request->input('table_id');

        // Simpan data reservasi (implementasi dapat disesuaikan)
        return view('reservations.confirmation', compact('selectedMenus', 'tableId'));
    }
}
