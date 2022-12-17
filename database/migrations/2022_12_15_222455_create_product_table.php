<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id('product_id');
            $table->unsignedBigInteger('invoice_no')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('rental')->nullable();
            $table->string('period')->nullable();
            $table->string('unit')->nullable();
            $table->integer('price')->nullable();
            $table->integer('qty')->nullable();
            $table->integer('amount')->nullable();
            $table->foreign('invoice_no')->references('invoice_no')->on('invoice')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
