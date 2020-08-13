<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('Attributes');
        Schema::create('Attributes',function(Blueprint $table){
            $table->increments('code');
            $table->string('name');
            $table->string('type');
            $table->string('validation');
            $table->boolean('is_required');
            $table->boolean('is_unique'); 
            $table->boolean('is_filterable');
            $table->boolean('is_configurable');            

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
