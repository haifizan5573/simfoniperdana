<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFundUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fund_users', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('userid')->unsigned();
            $table->bigInteger('fundid')->unsigned();
            $table->longText('formdata');
            $table->string('contribution')->nullable();
            $table->string('paymentkey')->nullable();
            $table->string('paymentstatus')->nullable();
            $table->timestamps();

            $table->foreign('userid')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('fundid')
            ->references('id')
            ->on('funds')
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
        Schema::dropIfExists('fund_users');
    }
}
