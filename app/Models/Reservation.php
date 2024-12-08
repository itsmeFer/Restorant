<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = ['table_id', 'menus', 'status'];

    // Relasi ke tabel tables
    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}
