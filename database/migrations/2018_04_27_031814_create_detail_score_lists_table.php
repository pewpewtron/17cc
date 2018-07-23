<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailScoreListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_score_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('score_list_id')->nullable();
            $table->enum('part',['a','b','c','d','e','f','g','h','i','j','k','l',
                    'm','n','o','p','q','r','s','t'])->nullable();
            $table->Double('score')->nullable();
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
        Schema::dropIfExists('detail_score_lists');
    }
}
