<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service', function (Blueprint $table) {
            $table->id('service_id');
            $table->string('number')->nullable();
            $table->string('name')->nullable();
            $table->string('model')->nullable();
            $table->string('brand')->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedBigInteger('invoice_no')->nullable();
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
        Schema::dropIfExists('services');
    }
}
