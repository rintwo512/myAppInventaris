<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCctvMonitor2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cctv_monitor2', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('image')->nullable();
            $table->string('lokasi');
            $table->string('merk');
            $table->string('type');
            $table->string('status');
            $table->string('resolusi')->nullable();
            $table->string('tgl_pemasangan')->nullable();
            $table->string('petugas_pemasangan')->nullable();
            $table->string('tgl_perbaikan')->nullable();
            $table->string('petugas_perbaikan')->nullable();
            $table->string('catatan')->nullable();
            $table->string('sandi_dvr')->nullable();
            $table->string('kerusakan')->nullable();
            $table->string('user_updated')->nullable();
            $table->string('user_delete')->nullable();
            $table->string('updated_time')->nullable();
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('cctv_monitor2');
    }
}
