<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->id();
            $table->string('outlet_name')->nullable();
            $table->string('outlet_phone')->nullable();
            $table->string('slug')->nullable();
            $table->string('outlet_owner')->nullable();
            $table->integer('buyers')->unsigned()->nullable();
            $table->string('link_wa')->nullable();
            $table->string('link_ig')->nullable();
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
        Schema::dropIfExists('outlets');
    }
}
