<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityItenariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_itenaries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('activityid')->unsigned();
            $table->string('name');
            $table->longtext('description');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->bigInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('activityid')
            ->references('id')
            ->on('activities')
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
        Schema::dropIfExists('activity_itenaries');
    }
}
