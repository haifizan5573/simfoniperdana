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
            $table->string('productid')->nullable();
            $table->string('amountapplied')->nullable();
            $table->string('cashinhand')->nullable();
            $table->string('amountapproved')->nullable();
            $table->date('approvaldate')->nullable();
            $table->date('disburseddate')->nullable();
            $table->date('rejecteddate')->nullable();
            $table->string('agentid')->nullable();
            $table->string('assignedto')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
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
