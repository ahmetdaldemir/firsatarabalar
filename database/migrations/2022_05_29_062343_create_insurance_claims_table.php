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
            $table->unsignedBigInteger("id_insurance");
            $table->foreign('id_insurance')->references('id')->on('insurance')->onDelete('restrict');
            $table->unsignedBigInteger("id_car");
            $table->foreign('id_car')->references('id')->on('cars')->onDelete('restrict');
            $table->unsignedBigInteger("id_customer");
            $table->foreign('id_customer')->references('id')->on('customer')->onDelete('restrict');
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
