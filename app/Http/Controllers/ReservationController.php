<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    // Menampilkan menu makanan dan minuman
    public function selectMenus()
    {
        $foods = Menu::where('category', 'Makanan')->get();
        $drinks = Menu::where('category', 'Minuman')->get();

        return view('reservations.menus', compact('foods', 'drinks'));
    }

    // Menampilkan halaman untuk memilih meja setelah menu dipilih
    public function selectTable(Request $request)
    {
        // Validasi bahwa minimal 1 menu dipilih
        $request->validate([
            'menus' => 'required|array|min:1',
        ]);

        // Simpan menu yang dipilih ke dalam session (atau langsung ke database jika diperlukan)
        $selectedMenus = $request->menus;
        $request->session()->put('selectedMenus', $selectedMenus);

        // Ambil semua meja yang tersedia
        $tables = Table::where('status', 'available')->get();

        return view('tables.index', compact('tables', 'selectedMenus'));
    }

    // Konfirmasi reservasi
    public function confirmReservation(Request $request)
    {
        // Menyimpan reservasi ke database
        $reservation = new Reservation();
        $reservation->table_id = $request->table_id;
        $reservation->menus = json_encode($request->menus);
        $reservation->status = 'confirmed';
        $reservation->save();

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil!');

        // Validasi meja yang dipilih
        $request->validate([
            'table_id' => 'required|exists:tables,id',
        ]);

        // Ambil data menu yang telah dipilih dari session
        $selectedMenus = $request->session()->get('selectedMenus');

        // Simpan ke database (logika penyimpanan ke tabel orders atau reservasi)
        $reservation = new \App\Models\Reservation();
        $reservation->table_id = $request->table_id;
        $reservation->menus = json_encode($selectedMenus); // Simpan menu dalam bentuk JSON
        $reservation->status = 'confirmed';
        $reservation->save();

        // Tandai meja sebagai "occupied"
        $table = Table::find($request->table_id);
        $table->status = 'occupied';
        $table->save();

        // Hapus data menu dari session
        $request->session()->forget('selectedMenus');

        return redirect()->route('reservations.menus')->with('success', 'Reservasi berhasil dikonfirmasi!');
    }
}
