<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKhairatUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khairat_users', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('userid')->unsigned();
            $table->BigInteger('khairat')->unsigned();
            $table->string('membership');
            $table->string('attachment');
            $table->BigInteger('status')->unsigned();
            $table->timestamps();

            $table->foreign('userid')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('khairat')
            ->references('id')
            ->on('khairats')
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
        Schema::dropIfExists('khairat_users');
    }
}
