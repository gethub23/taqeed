<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFuelPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fuel_points', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();

            $table->string('identity')->nullable();

            $table->decimal('fuel_reading', 20 , 2)->nullable()->default(0);

            $table->enum('status', ['available', 'used' , 'off'])->nullable()->default('available');

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
        Schema::dropIfExists('fuel_points');
    }
}
