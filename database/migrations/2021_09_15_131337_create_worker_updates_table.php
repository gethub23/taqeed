<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerUpdatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_updates', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['password', 'phone'])->default('password');
            $table->integer('code');
            $table->string('new_phone')->nullable();;
            $table->dateTime('code_expire')->nullable();
            $table->boolean('confirmed')->default(false);
            $table -> unsignedBigInteger( 'station_worker_id' ) -> unsigned() -> index()->nullable();
            $table -> foreign( 'station_worker_id' ) -> references( 'id' ) -> on( 'station_workers' )-> onDelete( 'cascade' );
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
        Schema::dropIfExists('worker_updates');
    }
}
