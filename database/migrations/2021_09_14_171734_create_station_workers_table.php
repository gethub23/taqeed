<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationWorkersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_workers', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->default('default.png');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('identity')->nullable();
            $table->string('password')->nullable();
            $table->string('work_time')->nullable();
            $table->longText('token')->nullable();
            $table->boolean('active')->default(false);
            $table->boolean('ban')->default(false);
            $table->enum('type', ['worker', 'supervisor'])->nullable()->default('worker');

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'city_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'city_id' ) -> references( 'id' ) -> on( 'cities' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'nationality_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'nationality_id' ) -> references( 'id' ) -> on( 'nationalities' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('station_workers');
    }
}
