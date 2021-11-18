<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeminjamenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjamen', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('civitas_id');
            $table->foreignId('buku_id');
            $table->foreignId('user_id');
            $table->enum('status', ['Pinjam', 'Dikembalikan', 'Denda'])->default('Pinjam');
            $table->enum('allowed', ['1', '0'])->default('0');
            $table->softDeletes();
            $table->timestamps();
            $table->timestamp('lastreturn')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('peminjamen');
    }
}
