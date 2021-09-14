<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tanks', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->decimal('capacity', 10, 2)->nullable();
            $table->decimal('current_capacity', 10, 2)->nullable();
            $table->enum('status', ['active', 'empty' , 'broken'])->nullable()->default('active');

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'fuel_id' ) -> unsigned() -> index();
            $table -> foreign( 'fuel_id' ) -> references( 'id' ) -> on( 'fuels' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('tanks');
    }
}
