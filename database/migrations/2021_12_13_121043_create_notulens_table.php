<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotulensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notulens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('notulis_id');
            $table->string('hari');
            $table->dateTime('tanggal');
            $table->string('tempat');
            $table->string('peserta');
            $table->text('materi_rapat');
            $table->text('risalah_rapat');
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
        Schema::dropIfExists('notulis');
    }
}
