<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRolIdToMvcUsuarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mvc_usuarios', function (Blueprint $table) {
            $table->bigInteger('rol')->unsigned()->after('password')->nullable();
            $table->foreign('rol')->references('id')->on('mvc_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mvc_usuarios', function (Blueprint $table) {
            $table->dropColumn('rol');
        });
    }
}