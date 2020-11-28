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
            $table->text('product_description')->nullable();
            $table->unsignedBigInteger('outlet_id');  // No default 0
            $table->unsignedBigInteger('product_category_id');
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->foreign('product_category_id')->references('id')->on('product_categories');       

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
