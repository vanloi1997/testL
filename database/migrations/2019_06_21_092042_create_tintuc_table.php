<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTintucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tintuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('TieuDe',255);
            
            $table->longText('NoiDung');
            $table->string('Hinh');
            $table->bigInteger('idLoaiTin')->unsigned();
            $table->timestamps();

            $table->foreign('idLoaiTin')->references('id')->on('loaitin');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tintuc');
    }
}
