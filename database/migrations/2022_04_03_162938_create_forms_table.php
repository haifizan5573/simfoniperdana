<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description');
            $table->bigInteger('category')->unsigned();
            $table->bigInteger('status')->unsigned();
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->Integer('form_fund')->default(1);
            $table->string('form_user')->nullable();
            $table->timestamps();

            $table->foreign('category')
            ->references('id')
            ->on('labels')
            ->onDelete('cascade');

            $table->foreign('status')
            ->references('id')
            ->on('labels')
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
        Schema::dropIfExists('forms');
    }
}
