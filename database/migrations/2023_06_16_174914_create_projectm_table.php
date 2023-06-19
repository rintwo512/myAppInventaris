<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectm', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_pek');
            $table->string('lokasi_pek');
            $table->string('petugas_pek');
            $table->string('detail_pek');
            $table->string('des_pek')->nullable();;
            $table->string('tgl_mulai_pek');
            $table->string('tgl_akhir_pek');
            $table->string('status_pek');
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
        Schema::dropIfExists('projectm');
    }
}
