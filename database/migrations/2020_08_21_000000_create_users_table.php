<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->unique();
            $table->string('code', 10)->nullable();
            $table->string('password');
            $table->string('avatar', 50)->default('default.png');
            $table->string('key')->default('+966');
            $table->string('device_id')->default('');
            $table->longText('token')->default('');
            
            $table->integer('role_id')->default(0);
//            $table->integer('user_type')->default(2)->comment = '1->admin  -  2->user ';
            $table->enum('user_type', ['user', 'admin'])->default('user');
            $table->boolean('active')->default(0);
            $table->boolean('block')->default(0);
            $table->string('lang', 2)->default('ar');
            $table->string('is_notify')->default(1);
            $table->dateTime('code_expire')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
