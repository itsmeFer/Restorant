<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Models\Menu;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function index()
    {
        // Menampilkan daftar meja yang tersedia
        $tables = Table::all();
        return view('tables.index', compact('tables'));
    }

    public function selectTable(Request $request)
    {
        // Menyimpan pilihan meja yang dipilih
        $table = Table::find($request->table_id);
        $menus = $request->menus;

        // Ambil menu yang dipilih oleh pelayan
        $selectedMenus = Menu::whereIn('id', $menus)->get();

        // Tampilkan rincian pesanan dan meja yang dipilih
        return view('reservations.confirmation', compact('table', 'selectedMenus'));
    }
}
