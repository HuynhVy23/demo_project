<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCTHoaDonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('c_t__hoa_dons', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('id_hoa_don');
            $table->integer('id_san_pham')->unsigned();
            $table->integer('so_luong_ct');
            $table->integer('don_gia_ct');
            $table->integer('tong');
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
        Schema::dropIfExists('c_t__hoa_dons');
    }
}
