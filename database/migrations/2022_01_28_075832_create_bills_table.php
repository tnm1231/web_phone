<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->string('hash');
            $table->integer('status')->default(0)->comment('0: Vừa đặt hàng, 1: Đã xác nhận, 2: Đang giao hàng, 3: Đơn hàng hoàn trả, 4: Đơn hàng thành công');
            $table->integer('user_id');
            $table->integer('address_id');
            $table->double('total')->nullable();
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
        Schema::dropIfExists('bills');
    }
}
