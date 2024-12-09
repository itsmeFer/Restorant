<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->time('check_in_time')->nullable();  // Jam masuk
            $table->time('check_out_time')->nullable(); // Jam keluar
            $table->string('payment_method')->nullable(); // Pembayaran via
            $table->string('customer_name')->nullable(); // Atas nama
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
