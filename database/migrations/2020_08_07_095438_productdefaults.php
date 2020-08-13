<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Productdefaults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('products',function(Blueprint $table){
            $table->string('sku')->default(0)->change();
            $table->string('name')->default('Null')->change();
            $table->string('slug')->default('Null')->change();
            $table->decimal('price', 15, 2)->default(0)->change();
            $table->decimal('weight', 10, 2)->default(0.00)->change();
            $table->decimal('width', 10, 2)->default(0.00)->change();
            $table->decimal('height', 10, 2)->default(0.00)->change();
            $table->decimal('depth', 10, 2)->default(0.00)->change();
            $table->text('short_description')->default('Null')->change();
            $table->text('description')->default('Null')->change();
            $table->integer('status')->default(0)->change();
           
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
