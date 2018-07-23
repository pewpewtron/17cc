<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('group_name', 50);
            $table->string('institution', 50);
            $table->string('username', 50);
            $table->string('password');
            $table->string('email');
            $table->string('u_token')->nullable();
            $table->boolean('online')->nullable();
            $table->dateTime('last_login_at')->nullable();
            $table->tinyInteger('competition_id');
            $table->boolean('verified')->nullable();
            $table->dateTime('verified_at')->nullable();
            $table->tinyInteger('verifying_admin')->nullable();
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('groups');
    }
}
