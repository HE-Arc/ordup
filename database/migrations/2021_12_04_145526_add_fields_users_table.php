<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('name', 'firstname');
            $table->string('lastname')->after('name');
            $table->boolean('is_admin')->default(false)->after('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('users', function (Blueprint $table) {
            $table->renameColumn('firstname', 'name');
            $table->dropColumn('lastname');
            $table->dropColumn('is_admin');
        });
    }
}
