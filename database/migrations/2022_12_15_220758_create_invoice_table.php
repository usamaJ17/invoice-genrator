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
            $table->string('manual')->nullable();
            $table->timestamp('date')->nullable();
            $table->unsignedBigInteger('customer')->nullable();
            $table->string('authorized')->nullable();
            $table->string('phone')->nullable();
            $table->string('trn')->nullable();
            $table->string('type')->nullable();
            $table->string('payment')->nullable();
            $table->string('lpo')->nullable();
            $table->string('reference')->nullable();
            $table->text('address')->nullable();
            $table->string('remarks')->nullable();
            $table->integer('total')->nullable();
            $table->float('discount')->nullable();
            $table->float('gross')->nullable();
            $table->float('vat')->nullable();
            $table->float('vat_amount')->nullable();  
            $table->foreign('customer')->references('id')->on('customers')->onDelete('cascade');   
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
        Schema::dropIfExists('invoice');
    }
}
