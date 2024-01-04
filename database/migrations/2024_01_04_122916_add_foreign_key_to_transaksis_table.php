<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->foreign('pelanggan_id')->references('id')->on('pelanggans')->onDelete('restrict');
            $table->foreign('layanan_id')->references('id')->on('layanans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaksis', function (Blueprint $table) {
            $table->dropForeign(['pelanggan_id']);
            $table->dropForeign(['layanan_id']);
        });
    }
};
