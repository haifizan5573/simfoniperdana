<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('minloan')->nullable();
            $table->string('maxloan')->nullable();
            $table->string('maxtenure')->nullable();
            $table->integer('status')->default(1);
            $table->BigInteger('groupid')->unsigned();
            $table->timestamps();

            $table->foreign('groupid')
            ->references('id')
            ->on('product_groups')
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
        Schema::dropIfExists('products');
    }
}
