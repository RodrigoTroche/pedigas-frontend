<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('main_street');
            $table->string('intersection_street_first');
            $table->string('intersection_street_second');
            $table->string('main_number');
            $table->integer('is_department')->default(0);
            $table->json('department')->nullable();
            //->default(json_encode([
            //     'name' => '',
            //     'flat_number' => '',
            //     'door_number' => ''
            // ]))
            $table->string('reference')->nullable();
            $table->string('contact')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('city_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}