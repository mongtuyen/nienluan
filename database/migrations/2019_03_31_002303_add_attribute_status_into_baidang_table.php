<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeStatusIntoBaidangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('baidang', function (Blueprint $table) {
            $table->unsignedTinyInteger('status')->default('1')->comment('1: Đang hoạt động, 2: Kết thúc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('baidang', function (Blueprint $table) {
            //
        });
    }
}
