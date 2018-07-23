<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminMessageTemporariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_message_temporaries', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('admin_id');
            $table->Integer('group_id');
            $table->string('subject');
            $table->text('message');
            $table->boolean('view')->default(0);
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
        Schema::dropIfExists('admin_message_temporaries');
    }
}
