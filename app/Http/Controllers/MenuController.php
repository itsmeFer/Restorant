<?php

// app/Http/Controllers/MenuController.php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        // Ambil data makanan dan minuman dari tabel menus
        $foods = Menu::where('category', 'Makanan')->get(); // Ambil data kategori Makanan
        $drinks = Menu::where('category', 'Minuman')->get(); // Ambil data kategori Minuman

        // Kirim data ke view
        return view('menus.index', compact('foods', 'drinks'));
    }
}
