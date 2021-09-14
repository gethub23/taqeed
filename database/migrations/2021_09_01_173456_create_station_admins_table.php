<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStationAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_admins', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('identity')->nullable();
            $table->string('avatar')->default('default.png');
            $table->boolean('block')->nullable()->default(false);
            $table->boolean('active')->nullable()->default(true);
            $table->enum('type', ['master', 'admin'])->default('master');

            $table -> unsignedBigInteger( 'nationality_id' ) -> unsigned() -> index();
            $table -> foreign( 'nationality_id' ) -> references( 'id' ) -> on( 'nationalities' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'city_id' ) -> unsigned() -> index();
            $table -> foreign( 'city_id' ) -> references( 'id' ) -> on( 'cities' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'station_id' ) -> unsigned() -> index();
            $table -> foreign( 'station_id' ) -> references( 'id' ) -> on( 'stations' )-> onDelete( 'cascade' );

            $table -> unsignedBigInteger( 'station_role_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'station_role_id' ) -> references( 'id' ) -> on( 'station_roles' )-> onDelete( 'cascade' );

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
        Schema::dropIfExists('station_admins');
    }
}
