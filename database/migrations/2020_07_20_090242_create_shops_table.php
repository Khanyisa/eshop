<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Shops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('addressline1');
            $table->text('addressline2');
            $table->string('city');
            $table->string('postalcode');
            $table->string('imgfilepath');
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
        Schema::dropIfExists('shops');
    }
}
