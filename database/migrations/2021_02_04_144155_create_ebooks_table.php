<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ebooks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul');
            $table->string('slug');
            $table->text('deskripsi');
            $table->string('penerbit')->nullable();
            $table->string('gambar')->nullable();
            $table->enum('kategori', ['Pertanian', 'Seni & desain', 'Bisnis & ekonomi', 'Anak-anak', 'Novel', 'Komik', 'Komputer & teknologi', 'Masakan', 'Pendidikan', 'Fiksi & sastra', 'Finansial', 'Sejarah', 'Agama', 'Romance', 'Sains', 'Self improvement', 'Tugas akhir', 'Jurnal']);
            $table->string('tahun');
            $table->string('penulis');
            $table->string('issn')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('volume')->nullable();
            $table->string('edisi')->nullable();
            $table->string('pdf')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ebooks');
    }
}
