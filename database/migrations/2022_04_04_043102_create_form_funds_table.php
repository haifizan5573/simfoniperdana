<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormFundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form_funds', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('formid')->unsigned();
            $table->string('totalfund');
            $table->string('fundtype');
            $table->timestamps();

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
        Schema::dropIfExists('form_funds');
    }
}
