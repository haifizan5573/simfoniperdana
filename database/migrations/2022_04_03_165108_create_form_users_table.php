<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid')->unsigned();
            $table->bigInteger('formid')->unsigned();
            $table->longText('formdata');
            $table->timestamps();

            $table->foreign('userid')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('formid')
            ->references('id')
            ->on('forms')
            ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('form_users');
    }
}
