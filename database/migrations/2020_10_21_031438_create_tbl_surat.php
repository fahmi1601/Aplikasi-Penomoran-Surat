<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSurat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_surat', function (Blueprint $table) {
            $table->id();
            $table->integer('nomor_surat');
            $table->unsignedBigInteger('id_takah');
            $table->foreign('id_takah')
            ->references('id')->on('tbl_takah')
            ->onUpdate('cascade');
            $table->char('tahun', 4);
            $table->date('tanggal');
            $table->string('kepada', 100);
            $table->string('perihal', 200)->nullable();
            $table->string('tembusan', 100)->nullable();
            $table->string('keterangan', 100)->nullable();
            $table->string('pembuat', 15);
            $table->foreign('pembuat')
            ->references('nik')->on('tbl_users')
            ->constrained('pembuat')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('tbl_surat');
    }
}
