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
        Schema::create('kos', function (Blueprint $table) {
            $table->id();

         

            $table->string('name');              // Nama kos
            $table->text('address');             // Alamat lengkap
            $table->text('description')->nullable(); // Deskripsi kos
            $table->text('facilities')->nullable();  // Fasilitas (AC, WiFi, dll)
            $table->integer('price');            // Harga sewa per bulan
            $table->string('image');
            $table->text('rules')->nullable();   // Peraturan kos
            $table->softDeletes();
            $table->string('contact_person');    // Kontak person
            $table->timestamps();                // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kos');
    }
};
