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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('identity');
            $table->string('phone');
            $table->string('email');
            $table->string('password');
            $table->string('remember_token');
            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->string('smscode')->nullable();

            $table->unsignedBigInteger("city_id");
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('restrict');


            $table->unsignedBigInteger("town_id");
            $table->foreign('town_id')->references('id')->on('towns')->onDelete('restrict');

            $table->string('freecar')->nullable();
            $table->dateTime('date_login')->nullable();
            $table->boolean('status')->default(1);
            $table->string('parasut_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('tax_number')->nullable();
            $table->string('tax_office')->nullable();
            $table->double('reward')->default(0);
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
        Schema::dropIfExists('customers');
    }
};
