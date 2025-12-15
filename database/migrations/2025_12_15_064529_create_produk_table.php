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
        Schema::create('produk', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');       // nama produk
            $table->text('deskripsi');           // deskripsi produk
            $table->integer('harga');            // harga produk
            $table->unsignedBigInteger('jenis_produk_id'); // relasi ke jenis_produk
            $table->timestamps();

            // foreign key relasi ke tabel jenis_produk
            $table->foreign('jenis_produk_id')
                ->references('id')
                ->on('jenis_produk')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produk');
    }

};
