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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_parent')->default(0);
            $table->enum('type',['page','blog','destination'])->default('page');
            $table->text('title');
            $table->text('content')->nullable();
            $table->string('images')->nullable();
            $table->string('slug');
            $table->string('meta_key')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('labels')->nullable();
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
        Schema::dropIfExists('pages');
    }
};
