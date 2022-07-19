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
        Schema::create('customer_car_payment_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_car_id');
            $table->foreign('customer_car_id')->references('id')->on('customer_cars')->onDelete('restrict');
            $table->enum('payment_type',['rapor','security_deposit','other'])->default('rapor');
            $table->double('order_total',10,2)->default(0);
            $table->json('response_auth')->nullable();
            $table->json('response_payment')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('invoice')->default(0);
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
        Schema::dropIfExists('customer_car_payment_transactions');
    }
};
