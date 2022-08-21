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
        Schema::create('customer_cars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('restrict');


            $table->unsignedBigInteger('buyer_id')->nullable();



            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('restrict');



            $table->string('custom_version')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

            $table->string('car_city');
            $table->string('car_state');
            $table->string('car_neighbourhood');
            $table->string('title');
            $table->text('description');
            $table->year('caryear');
            $table->string('plate');
            $table->string('sasi')->nullable();
            $table->string('ownorder');
            $table->string('sebep')->comment('Burası incelenip adı değiştirilecek');
            $table->string('score');
            $table->string('km');
            $table->string('kmPhoto');
            $table->string('body');
            $table->string('gear');
            $table->string('fuel');
            $table->string('color');
            $table->string('damage');
            $table->string('maintenance_history');
            $table->boolean('status_frame');
            $table->boolean('status_pole');
            $table->boolean('status_podium');
            $table->boolean('status_airbag');
            $table->boolean('status_triger');
            $table->boolean('status_oppression');
            $table->boolean('status_brake');
            $table->boolean('status_tyre');
            $table->boolean('status_km');
            $table->boolean('status_unrealizable');
            $table->boolean('status_onArkaBagaj');
            $table->string('specs');
            $table->string('tramer');
            $table->string('tramerValue');
            $table->string('tramer_photo');
            $table->text('car_notwork')->nullable();
            $table->text('car_exterior_faults');
            $table->text('car_interior_faults');
            $table->double('gal_price_1',10,2)->default(0);
            $table->double('gal_price_2',10,2)->default(0);
            $table->double('gal_price_3',10,2)->default(0);
            $table->double('offer_price',10,2)->default(0);
            $table->double('price',10,2)->default(0);
            $table->string('valuation');
            $table->string('suggested');
            $table->string('suggested_accept');
            $table->string('shows');
            $table->string('date_end');
            $table->string('date_inspection');
            $table->string('laststep');
            $table->string('complete');
            $table->string('notcomplete_mail');
            $table->string('status');
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
        Schema::dropIfExists('customer_cars');
    }
};
