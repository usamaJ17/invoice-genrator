<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part', function (Blueprint $table) {
            $table->id('part_id');
            $table->unsignedBigInteger('purchase_no');
            $table->string('name');
            $table->string('unit');
            $table->float('qty');
            $table->float('price');
            $table->float('amount');
            $table->foreign('purchase_no')->on('purchase')->references('purchase_no')->onDelete('cascade');
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
        Schema::dropIfExists('part');
    }
}
