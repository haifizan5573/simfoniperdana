<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_users', function (Blueprint $table) {
            $table->BigInteger('position_id')->unsigned();
            $table->BigInteger('user_id')->unsigned();
            $table->foreign('position_id')
                    ->references('id')
                    ->on('positions')
                    ->onDelete('cascade');
    
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('cascade');
    
            $table->primary(['position_id', 'user_id'], 'user_have_team');
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
        Schema::dropIfExists('position_users');
    }
}
