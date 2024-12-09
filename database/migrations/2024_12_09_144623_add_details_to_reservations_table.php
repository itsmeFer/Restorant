<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('customer_name')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->dropColumn(['start_time', 'end_time', 'payment_method', 'customer_name']);
        });
    }
    
};
