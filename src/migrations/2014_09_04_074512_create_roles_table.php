<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{

    /* public up() {{{ */
    /**
     * Run the migrations.
     *
     * @access public
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name');
            $table->string('description')->nullable();

            $table->timestamps();
        });
    }
    /* }}} */


    /* public down() {{{ */
    /**
     * Reverse the migrations.
     *
     * @access public
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
    }
    /* }}} */
}
