<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysOnCommandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('commands', function (Blueprint $table) {
            //Add foreign keys constraints
            $table->foreign('waiter_id')->references('id')->on('users')->onDelete('set null');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('commands', function (Blueprint $table) {
            //Drop foreign key constraints
            $table->dropForeign('commands_waiter_id_foreign');
            $table->dropForeign('commands_place_id_foreign');
        });
    }
}
