<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hobis', function (Blueprint $table) {
            $table->id();
            $table->string('hobi');
            $table->timestamps();
        });
        schema::create('mahasiswa_hobi', function (Blueprint $table){
            $table->id();
            $table->BigInteger('id_mahasiswa')->unsigned();
            $table->BigInteger('id_hobi')->unsigned();
            $table->foreign('id_mahasiswa')->references('id')->on('mahasiswas')
                ->ondelete('cascade');
            $table->foreign('id_hobi')->references('id')->on('hobis')
                ->ondelete('cascade');    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hobis');
        Schema::dropIfExists('mahasiswa_hobi');

    }
};
