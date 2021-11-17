<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysOnSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sheets', function (Blueprint $table) {
            //Add foreign keys constraints
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('set null');
            $table->foreign('command_id')->references('id')->on('commands')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sheets', function (Blueprint $table) {
            //Drop foreign key constraints
            $table->dropForeign('sheets_drink_id_foreign');
            $table->dropForeign('sheets_command_id_foreign');
        });
    }
}
