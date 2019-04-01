<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaugiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daugia', function (Blueprint $table) {
            $table->increments('dg_ma');
            $table->dateTime('dg_time')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->text('dg_noiDung');
            $table->unsignedInteger('dg_khoiLuong')->nullable()->default(NULL); 
            $table->unsignedTinyInteger('dg_trangThai')->default('1')->comment('1: , 2: Được chọn');
       
            $table->unsignedInteger('nd_ma');
            $table->foreign('nd_ma')->references('nd_ma')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('bd_ma');
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
        Schema::dropIfExists('daugia');
    }
}
