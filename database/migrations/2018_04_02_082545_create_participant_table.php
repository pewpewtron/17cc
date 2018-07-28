<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('captain');
            $table->integer('group_id');
            $table->string('code', 20)->nullable();
            $table->string('full_name', 50);
            $table->date('birthdate');
            $table->string('email');
            $table->string('contact', 13);
            $table->string('photo', 20)->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('vegetarian');
            $table->boolean('buy_shirt');
            $table->enum('size', ['XS','S','M','L','XL','XXL'])->nullable();
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
        Schema::dropIfExists('participants');
    }
}
