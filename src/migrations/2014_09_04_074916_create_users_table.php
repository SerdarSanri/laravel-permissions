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

            $table->string('email')->unique();
            $table->string('password');

            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');

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
        Schema::drop('users');
    }
    /* }}} */
}
