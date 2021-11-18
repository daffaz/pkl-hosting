<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('nim');
            $table->string('email');
            $table->enum('prodi', ['Komunikasi', 'Ekowisata', 'Manajemen Informatika', 'Teknik Komputer', 'Supervisor Jaminan Mutu Pangan', 'Manajemen Industri Jasa Makanan dan Gizi', 'Teknologi Industri Benih', 'Teknologi Produksi dan Manajemen Perikanan Budidaya', 'Teknologi dan Manajemen Ternak', 'Manajemen Agribisnis', 'Manajemen Industri', 'Analisis Kimia', 'Teknik dan Manajemen Lingkungan', 'Akuntansi', 'Paramedik Veteriner', 'Teknologi Produksi dan Manajemen Perkebunan', 'Teknologi Produksi dan Pengembangan Masyarakat Pertanian']);
            $table->timestamp('email_verified_at');
            $table->string('password');
            $table->string('username');
            $table->enum('status', ['0', '1']);
            $table->foreignId('civitas_id');
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
