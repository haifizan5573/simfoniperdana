<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('loan_id')->unsigned();
            $table->bigInteger('doc_id')->unsigned();
            $table->string('name');
            $table->longtext('remark')->nullable();
            $table->string('status');
            $table->timestamps();

            $table->foreign('loan_id')
            ->references('id')
            ->on('loans')
            ->onDelete('cascade');

            $table->foreign('doc_id')
            ->references('id')
            ->on('documents')
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
        Schema::dropIfExists('loan_documents');
    }
}
