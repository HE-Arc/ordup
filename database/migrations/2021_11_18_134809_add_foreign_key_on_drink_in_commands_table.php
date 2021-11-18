<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyOnDrinkInCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('drink_in_commands', function (Blueprint $table) {
            $table->foreignId('drink_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('command_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drink_in_commands', function (Blueprint $table) {
            $table->dropForeign(['drink_id']);
            $table->dropColumn('drink_id');

            $table->dropForeign(['command_id']);
            $table->dropColumn('command_id');
        });
    }
}
