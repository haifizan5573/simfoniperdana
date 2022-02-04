<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('parent')->nullable();;
            $table->BigInteger('group_id')->unsigned();
            $table->string('order')->default(0);
            $table->string('icon')->nullable();
            $table->string('url')->nullable();
            $table->timestamps();

            $table->foreign('group_id')
            ->references('id')
            ->on('menu_groups')
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
        Schema::dropIfExists('menus');
    }
}
