<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNguoidungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidung', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('nd_ma');
            $table->string('nd_taiKhoan',50);
            $table->string('nd_matKhau',50);
            $table->string('nd_hoTen',100);
            $table->unsignedTinyInteger('nd_gioiTinh')->default('1')->comment('1: Nam, 2: Nữ');
            $table->string('nd_email',100);
            $table->dateTime('nd_ngaySinh');            
            $table->string('nd_diaChi',250);
            $table->string('nd_dienThoai',11);
            $table->unique(['nd_taiKhoan','nd_email','nd_dienThoai']);
            $table->unsignedInteger('q_ma');
            $table->foreign('q_ma')->references('q_ma')->on('quyen')->onDelete('cascade')->onUpdate('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nguoidung');
    }
}
