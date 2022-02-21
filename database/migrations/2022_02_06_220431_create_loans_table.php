<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('customerid')->unsigned();
            $table->BigInteger('productid')->unsigned();
            $table->string('appID')->nullable();
            $table->string('amountapplied')->nullable();
            $table->string('cashinhand')->nullable();
            $table->string('amountapproved')->nullable();
            $table->date('receiveddate')->nullable();
            $table->date('approvaldate')->nullable();
            $table->date('disburseddate')->nullable();
            $table->date('rejecteddate')->nullable();
            $table->BigInteger('agentid')->unsigned();
            $table->BigInteger('assignedto')->unsigned();
            $table->BigInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('productid')
            ->references('id')
            ->on('products')
            ->onDelete('cascade');

            $table->foreign('agentid')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('assignedto')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('status')
            ->references('id')
            ->on('statuses')
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
        Schema::dropIfExists('loans');
    }
}
