<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('c_t__hoa_dons', function (Blueprint $table) {
            $table->foreign('id_hoa_don')->references('id')->on('hoa_dons');
            $table->foreign('id_san_pham')->references('id')->on('san_phams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('c_t__hoa_dons', function (Blueprint $table) {
            //
        });
    }
}
