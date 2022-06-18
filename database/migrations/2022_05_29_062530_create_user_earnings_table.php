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
        Schema::create('user_earnings', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');


            $table->unsignedBigInteger('customers_car_id');
            $table->foreign('customers_car_id')->references('id')->on('customer_cars')->onDelete('restrict');

            $table->unsignedBigInteger('valuation_id');
            $table->foreign('valuation_id')->references('id')->on('valuations')->onDelete('restrict');

            $table->double('earning',10,2)->default(0);
            $table->text('comments')->nullable();

            $table->enum('status',['waiting','complated','new'])->default('waiting');

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
        Schema::dropIfExists('users_earnings');
    }
};
