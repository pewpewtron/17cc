<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameScoreReqColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('score_reqs', function($table) {
            $table->renameColumn('object_id', 'file_id');
            $table->enum('status', [0,1]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('score_reqs', function($table) {
            $table->renameColumn('file_id', 'object_id');
            $table->dropColumn('status');
        });
    }
}
