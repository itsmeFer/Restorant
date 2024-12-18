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
    Schema::table('menus', function (Blueprint $table) {
        if (!Schema::hasColumn('menus', 'category')) {
            $table->string('category')->default('Makanan')->after('name');
        }
    });
}

public function down()
{
    Schema::table('menus', function (Blueprint $table) {
        if (Schema::hasColumn('menus', 'category')) {
            $table->dropColumn('category');
        }
    });
}

    
};
