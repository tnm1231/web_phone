<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('main_banner_1');
            $table->string('start_price')->nullable();
            $table->string('name_product')->nullable();
            $table->string('sale_offer')->nullable();
            $table->string('main_banner_2');
            $table->string('start_price_2')->nullable();
            $table->string('name_product_2')->nullable();
            $table->string('sale_offer_2')->nullable();
            $table->string('main_banner_3');
            $table->string('start_price_3')->nullable();
            $table->string('name_product_3')->nullable();
            $table->string('sale_offer_3')->nullable();
            $table->string('sub_banner_4');
            $table->string('start_price_4')->nullable();
            $table->string('name_product_4')->nullable();
            $table->string('sale_offer_4')->nullable();
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
        Schema::dropIfExists('banners');
    }
}
