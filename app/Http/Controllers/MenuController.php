<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
{
    $foods = Menu::where('type', 'food')->get(); // Makanan
    $drinks = Menu::where('type', 'drink')->get(); // Minuman
    return view('menus.index', compact('foods', 'drinks'));
}

}
