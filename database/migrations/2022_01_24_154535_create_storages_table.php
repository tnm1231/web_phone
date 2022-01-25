<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoragesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storages', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('cart_id');
            $table->integer('address_id');
            $table->integer('bill_id')->nullable();
            $table->integer('status')->default(0)->comment('0: Vừa đặt hàng, 1: Đã xác nhận, 2: Đang giao hàng, 3: Đơn hàng thành công, 4: Đơn hàng hoàn trả');
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
        Schema::dropIfExists('storages');
    }
}
