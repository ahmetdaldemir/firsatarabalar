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
        Schema::create('customer_car_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_car_id');
            $table->foreign('customer_car_id')->references('id')->on('customer_cars')->onDelete('restrict');
            $table->string('type');
            $table->string('process');
            $table->json('data');
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
        Schema::dropIfExists('customer_car_transactions');
    }
};
