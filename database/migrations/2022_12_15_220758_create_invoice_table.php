<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id('invoice_no');
            $table->unsignedBigInteger('user_id');
            $table->string('authorized')->nullable();
            $table->string('phone')->nullable();
            $table->string('trn')->nullable();
            $table->string('type')->nullable();
            $table->integer('payment')->nullable();
            $table->string('lpo')->nullable();
            $table->text('address')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('total')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('gross')->nullable();
            $table->integer('vat')->nullable();
            $table->integer('vat_amount')->nullable();     
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invoice');
    }
}
