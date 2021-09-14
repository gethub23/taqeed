<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_roles', function (Blueprint $table) {
            $table->id();
            
            $table->string('name');

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('station_roles');
    }
}
