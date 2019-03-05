<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHinhanhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hinhanh', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->unsignedInteger('ha_ma');
            $table->string('ha_ten',255);
            $table->unsignedInteger('bd_ma');
            $table->primary(['bd_ma', 'ha_ma']);
            $table->foreign('bd_ma')->references('bd_ma')->on('baidang')->onDelete('cascade')->onUpdate('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hinhanh');
    }
}
