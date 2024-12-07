<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('table_id');
            $table->text('menus'); // JSON untuk menyimpan menu
            $table->enum('status', ['pending', 'confirmed', 'completed']);
            $table->timestamps();

            // Membuat foreign key yang menghubungkan dengan tabel `tables`
            $table->foreign('table_id')->references('id')->on('tables');
        });
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
