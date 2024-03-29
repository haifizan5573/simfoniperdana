<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icnumber');
            $table->string('policeic')->nullable();
            $table->string('jobtitle')->nullable();
            $table->date('datejoined')->nullable();
            $table->BigInteger('employerid')->unsigned()->nullable();
            $table->string('email');
            $table->timestamps();

            $table->foreign('employerid')
            ->references('id')
            ->on('employers')
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
        Schema::dropIfExists('customers');
    }
}
