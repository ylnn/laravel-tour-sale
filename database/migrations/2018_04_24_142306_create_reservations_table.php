<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('reservation_id', 70)->unique();
            $table->unsignedInteger('date_id');
            $table->unsignedInteger('tour_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pax');
            $table->unsignedInteger('price');
            $table->unsignedInteger('total_price');
            $table->string('currency');
            $table->integer('payment_status')->default(0);
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
        Schema::dropIfExists('reservations');
    }
}
