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
        Schema::create('insurance_claims', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger("insurance_id");
            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('restrict');


            $table->unsignedBigInteger("id_car");
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('restrict');

            $table->unsignedBigInteger("customer_id");
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');

            $table->string('plate');
            $table->string('chassis_number');
            $table->double('price');
            $table->double('earnings');
            $table->enum('status',['wait','comfirm','cancel']);
            $table->enum('type',['insurance','car_insurance']);
            $table->enum('payment_type',['credit_card','bank_transfer']);
            $table->enum('payment_status',['wait','comfirm']);
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
        Schema::dropIfExists('insurance_claims');
    }
};
