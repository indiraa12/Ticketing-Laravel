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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('penumpang_id')->unsigned()->nullable();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('rute_id')->constrained('rutes')->cascadeOnDelete();
            $table->string('kode_pemesanan');
            $table->string('tempat_pemesanan');
            $table->string('kode_kursi');
            $table->dateTime('tanggal_pemesanan');
            $table->dateTime('tanggal_berangkat');
            $table->dateTime('jam_berangkat');
            $table->dateTime('jam_cekin');
            $table->integer('total_bayar');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
