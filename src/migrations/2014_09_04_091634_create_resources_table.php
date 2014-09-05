<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourcesTable extends Migration
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
        Schema::create('resources', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('name')->nullable();
            $table->string('action')->nullable();
            $table->string('url')->nullable();

            $table->integer('parent_id')->unsigned()->nullable();

            $table->index('parent_id');
            $table->foreign('parent_id')->references('id')->on('resources')->onDelete('cascade');
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
        Schema::drop('resources');
    }
    /* }}} */

}
