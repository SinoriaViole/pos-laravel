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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode_produk')->unique();
            // $table->integer('id_kategori')->unsigned();
             $table->foreignId('category_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
             $table->string('nama_produk')->unique();
             $table->string('merk')->nullable();
             $table->integer('harga_beli')->unsigned();
             $table->tinyInteger('diskon')->default(0);
             $table->integer('harga_jual')->unsigned();
             $table->integer('stok');
             $table->timestamps();
             $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
