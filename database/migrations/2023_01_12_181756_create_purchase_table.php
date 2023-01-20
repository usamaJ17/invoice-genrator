<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->id('purchase_no');
            $table->timestamp('date')->nullable();
            $table->unsignedInteger('sup_name')->nullable();
            $table->string('sup_invoice')->nullable();
            $table->string('sup_trn')->nullable();
            $table->string('phone')->nullable();
            $table->string('payment')->nullable();
            $table->string('remarks')->nullable();
            $table->string('bank')->nullable();
            $table->float('total')->nullable();
            $table->float('discount')->nullable();
            $table->float('gross')->nullable();
            $table->float('vat')->nullable();
            $table->float('vat_amount')->nullable();  
            $table->foreign('sup_name')->references('id')->on('suppliers')->onDelete('cascade'); 
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
        Schema::dropIfExists('purchase');
    }
}
