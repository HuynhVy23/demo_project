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
            $table->bigInteger('id');
            $table->bigInteger('id_hoa_don');
            $table->integer('id_san_pham');
            $table->integer('so_luong');
            $table->integer('don_gia');
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
