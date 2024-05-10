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
        Schema::create('komik', function (Blueprint $table) {
            $table->integer('id')->autoIncrement();
            $table->timestamps();
            $table->string('judul');
            $table->string('penulis');
            $table->integer('tahun')->nullable();
            $table->integer('isbn')->nullable();
            $table->text('sinopsis')->nullable();
            $table->integer('stok')->nullable();
            $table->integer('id_daftar_komik');
            $table->foreign('id_daftar_komik')->references('id')->on('daftar_komik')->restrictOnUpdate()->cascadeOnDelete();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komik');
        Schema::table('komik', function (Blueprint $table) {
            $table->dropForeign(['id_daftar_komik']);
            $table->dropColumn('id_daftar_komik');
        });
    }
};