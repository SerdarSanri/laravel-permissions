<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
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
        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');

            $table->timestamp();
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
        Schema::drop('users');
    }
    /* }}} */
}
