<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'job_position',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
            }
        );

        Schema::create(
            'roles',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name');
                $table->string('machine_name');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('roles');
        Schema::drop('job_position');
    }
}
