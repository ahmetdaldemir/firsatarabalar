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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('restrict');

            $table->unsignedBigInteger('model_id');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('restrict');

            $table->string('name');

            $table->string('fueltype')->nullable();
            // $table->enum('fueltype',['Gas','Diesel','Gaz+Benzin','Benzin','Electric','Hybrit']);
            $table->string('transmission')->nullable();
            //$table->enum('transmission',['Manuel','Automatic']);
            $table->string('bodytype');
            //$table->string('bodytype',['Cabrio','Coupe','Hatchback 3 kapı','Hatchback 5 kapı','Sedan','Station Wagon','MPV','Roadster']);

            $table->string('engine')->nullable();
            //$table->enum('engine',['1301 - 1600 cm3','1601 - 1800 cm3','1801 - 2000 cm3','2001 - 2500 cm3','2501 - 3000 cm3','3001 - 3500 cm3','3501 - 4000 cm3','4001 - 4500 cm3','4501 - 5000 cm3','5001 - 5500 cm3','5501 - 6000 cm3','6001 cm3']);

           // $table->string('horse',['50 HP-ye kadar','51 - 75 HP','76 - 100 HP','101 - 125 HP','126 - 150 HP','151 - 175 HP','176 - 200 HP','201 - 225 HP','226 - 250 HP','251 - 275 HP','276 - 300 HP','301 - 325 HP', '326 - 350 HP', '351 - 375 HP', '376 - 400 HP', '401 - 425 HP', '426 - 450 HP', '451 - 475 HP', '476 - 500 HP', '501 - 525 HP', '526 - 550 HP', '551 - 575 HP', '576 - 600 HP', '601 HP ve üzeri']);
            $table->string('horse')->nullable();

            $table->string('production_start');
            $table->string('production_end');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('cars');
    }
};
