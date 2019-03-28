<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine ='InnoDB';
            $table->increments('nd_ma');           
            $table->string('nd_name');
            $table->string('nd_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
            $table->unsignedTinyInteger('nd_gioiTinh')->default('1')->comment('1: Nam, 2: Nữ');           
            $table->dateTime('nd_ngaySinh');            
            $table->string('nd_diaChi',250)->nullable();
            $table->string('nd_dienThoai',11)->nullable();
            $table->unsignedInteger('q_ma');
            $table->foreign('q_ma')->references('q_ma')->on('quyen')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('users');
    }
}
