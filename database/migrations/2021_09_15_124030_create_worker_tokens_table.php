<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkerTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worker_tokens', function (Blueprint $table) {
            $table->id();
            $table->text('token')->nullable();
            $table->text('device_id')->nullable();
            $table->text('device_type')->nullable();
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
        Schema::dropIfExists('worker_tokens');
    }
}
