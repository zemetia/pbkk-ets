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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId("jenis_id")->constrained("jenis");
            $table->foreignId("kondisi_id")->constrained("kondisis");
            $table->string("keterangan")->nullable();
            $table->string("kecacatan")->nullable();
            $table->integer("jumlah");
            $table->string("path_gambar");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
