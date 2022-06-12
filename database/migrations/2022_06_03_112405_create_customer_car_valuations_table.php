<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_car_valuations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();

            $table->unsignedBigInteger('customers_car_id');
            $table->foreign('customers_car_id')->references('id')->on('customer_cars')->onDelete('restrict');


            $table->text('comment')->nullable();
            $table->string('link1')->nullable();
            $table->text('link1_comment')->nullable();
            $table->string('link2')->nullable();
            $table->text('link2_comment')->nullable();
            $table->string('link3')->nullable();
            $table->text('link3_comment')->nullable();
            $table->string('link4')->nullable();
            $table->text('link4_comment')->nullable();
            $table->string('link5')->nullable();
            $table->text('link5_comment')->nullable();
            $table->string('offer_price')->nullable();
            $table->string('earning')->nullable();
            $table->string('date_sendconfirm')->nullable();
            $table->string('date_customer_open')->nullable();
            $table->string('date_confirm')->nullable();
            $table->string('is_confirm')->nullable();
            $table->string('status')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('customer_car_valuations');
    }
};
