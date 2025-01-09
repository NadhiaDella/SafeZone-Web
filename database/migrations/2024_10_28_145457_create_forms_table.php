<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->unsignedBigInteger('advocat_id')->nullable();
            $table->foreign('advocat_id')->references('id')->on('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')->references('id')->on('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->unsignedBigInteger('form_type_id')->nullable();
            $table->foreign('form_type_id')->references('id')->on('form_types')
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('nama_korban')->nullable();
            $table->string('bertindak_sebagai')->nullable();
            $table->date('tgl_lapor')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('no_telp_lain')->nullable();
            $table->string('domisili')->nullable();
            $table->string('jenis_kekerasan_seksual')->nullable();
            $table->string('cerita_singkat_peristiwa')->nullable();
            $table->boolean('is_disabilitas')->nullable();
            $table->string('desc_disabilitas')->nullable();
            $table->string('nama_pelaku')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('waktu')->nullable();
            $table->string('via')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forms');
    }
};
