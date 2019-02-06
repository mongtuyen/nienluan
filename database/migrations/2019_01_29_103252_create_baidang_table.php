<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBaidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baidang', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('bd_ma');
            $table->text('bd_tieuDe');
            $table->dateTime('bd_ngayDang')->default(DB::raw('CURRENT_TIMESTAMP')); 
            $table->longText('bd_noiDung');
            $table->string('bd_hinh',255)->nullable()->default(NULL);
            $table->unsignedInteger('bd_khoiLuong')->nullable()->default(NULL);
            $table->unsignedInteger('bd_gia')->nullable()->default(NULL);     
            $table->dateTime('bd_ngayHetHan')->nullable()->default(NULL); 
            $table->unsignedTinyInteger('bd_trangThaisp')->default('1')->comment('1: Đã thu hoạch, 2: Gần thu hoạch')->nullable()->default(NULL);          
            $table->unsignedTinyInteger('bd_loai')->default('1')->comment('1: Tin bán, 2: Tin mua');
            $table->unsignedInteger('nd_ma');
            $table->foreign('nd_ma')->references('nd_ma')->on('nguoidung')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('sp_ma');
            $table->foreign('sp_ma')->references('sp_ma')->on('sanpham')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baidang');
    }
}
