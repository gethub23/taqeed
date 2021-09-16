<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->id();
            $table->decimal('start_count', 20, 2)->nullable();
            $table->decimal('end_count', 20, 2)->nullable();
            $table->decimal('liters', 20, 2)->nullable();
            $table->decimal('liter_price', 20, 2)->nullable();
            $table->decimal('total_price', 20, 2)->nullable();
            $table->decimal('cash_price', 20, 2)->nullable();
            $table->decimal('network_price', 20, 2)->nullable();
            $table->enum('type', ['eqaul', 'deficit' , 'increase'])->nullable();
            $table->enum('status', ['progress' , 'need_accept', 'accepted' , 'refused'])->nullable();

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );
            
            $table -> unsignedBigInteger( 'worker_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'worker_id' ) -> references( 'id' ) -> on( 'station_workers' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'supervisor_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'supervisor_id' ) -> references( 'id' ) -> on( 'station_workers' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'tank_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'tank_id' ) -> references( 'id' ) -> on( 'tanks' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'fuel_point_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'fuel_point_id' ) -> references( 'id' ) -> on( 'fuel_points' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'fuel_id' ) -> unsigned() -> index()->nullable();
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
        Schema::dropIfExists('shifts');
    }
}
