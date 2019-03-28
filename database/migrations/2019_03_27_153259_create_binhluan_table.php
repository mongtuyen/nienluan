<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBinhluanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('binhluan', function (Blueprint $table) {
            $table->increments('bl_ma');
            $table->dateTime('bl_time')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->text('bl_noiDung');
            $table->unsignedInteger('nd_ma');
            $table->foreign('nd_ma')->references('nd_ma')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('bd_ma');
            $table->foreign('bd_ma')->references('bd_ma')->on('baidang')->onDelete('cascade')->onUpdate('cascade');
      
            //$table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('binhluan');
    }
}
