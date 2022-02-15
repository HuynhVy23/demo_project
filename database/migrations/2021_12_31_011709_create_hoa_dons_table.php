<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoa_dons', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('email');
            $table->string('ngay_lap');
            $table->string('dia_chi');
            $table->string('so_dien_thoai');
            $table->string('ghi_chu')->nullable();
            $table->string('tong_tien');
            $table->integer('huy')->default(0);
            $table->string('loai_hd')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoa_dons');
    }
}
