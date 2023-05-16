<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resident_positions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('positionid')->unsigned();
            $table->bigInteger('userid')->unsigned();
            $table->string('parent');
            $table->string('title');
            $table->string('format');
            $table->string('type');
            $table->string('year');
            $table->integer('isactive')->default(1);
            $table->timestamps();


            $table->foreign('userid')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');


            $table->foreign('positionid')
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
        Schema::dropIfExists('resident_positions');
    }
}
