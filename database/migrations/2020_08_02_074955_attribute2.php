<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Attribute2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('attributes');
        Schema::create('attributes',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->string('code');
            $table->string('validation');
            $table->boolean('is_required');
            $table->boolean('is_unique'); 
            $table->boolean('is_filterable');
            $table->boolean('is_configurable');            
        
        });

        Schema::dropIfExists('attribute_options');
        Schema::create('attribute_options', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('attribute_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
        });
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('sku');
            $table->string('name');
            $table->string('slug');
            $table->decimal('price', 15, 2);
            $table->decimal('weight', 10, 2);
            $table->decimal('width', 10, 2);
            $table->decimal('height', 10, 2);
            $table->decimal('depth', 10, 2);
            $table->text('short_description');
            $table->text('description');
            $table->integer('status');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::dropIfExists('product_attribute_values');
          Schema::create('product_attribute_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('attribute_id');
          $table->text('text_value')->nullable();
            $table->boolean('boolean_value')->nullable();
            $table->integer('integer_value')->nullable();
            $table->decimal('float_value')->nullable();
           $table->datetime('datetime_value')->nullable();
            $table->date('date_value')->nullable();
            $table->text('json_value')->nullable();
            $table->timestamps();

          $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('attribute_id')->references('id')->on('attributes')->onDelete('cascade');
          });
         Schema::dropIfExists('product_inventories');
        Schema::create('product_inventories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('product_attribute_value_id');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           $table->foreign('product_attribute_value_id')->references('id')->on('product_attribute_values')->onDelete('cascade');
        });
       Schema::dropIfExists('categories');
        Schema::create('categories', function (Blueprint $table) {
            $table->id('id');
            $table->string('name');
           $table->string('slug');
           $table->bigInteger('parent_id');
            $table->timestamps();
        });
        Schema::dropIfExists('product_categories');
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
          $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
       Schema::dropIfExists('product_images');
        Schema::create('product_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('product_id');
            $table->text('path');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
        Schema::dropIfExists('orders');
       Schema::create('orders',function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('user_id');
				$table->string('code')->unique();
				$table->string('status');
				$table->datetime('order_date');
				$table->datetime('payment_due');
				$table->string('payment_status');
				$table->decimal('base_total_price', 16, 2)->default(0);
				$table->decimal('tax_amount', 16, 2)->default(0);
				$table->decimal('tax_percent', 16, 2)->default(0);
				$table->decimal('discount_amount', 16, 2)->default(0);
				$table->decimal('discount_percent', 16, 2)->default(0);
				$table->decimal('shipping_cost', 16, 2)->default(0);
				$table->decimal('grand_total', 16, 2)->default(0);
     		$table->text('note')->nullable();
				$table->string('customer_first_name');
				$table->string('customer_last_name');
				$table->string('customer_address1')->nullable();
				$table->string('customer_address2')->nullable();
				$table->string('customer_phone')->nullable();
				$table->string('customer_email')->nullable();
				$table->string('customer_city_id')->nullable();
				$table->string('customer_province_id')->nullable();
				$table->integer('customer_postcode')->nullable();
				$table->string('shipping_courier')->nullable();
				$table->string('shipping_service_name')->nullable();
				$table->unsignedBigInteger('approved_by')->nullable();
				$table->datetime('approved_at')->nullable();
				$table->unsignedBigInteger('cancelled_by')->nullable();
			$table->datetime('cancelled_at')->nullable();
				$table->text('cancellation_note')->nullable();
				$table->softDeletes();
				$table->timestamps();

				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('approved_by')->references('id')->on('users');
        $table->foreign('cancelled_by')->references('id')->on('users');
        				$table->index('code');
				$table->index(['code', 'order_date']);
			}
        );
        Schema::dropIfExists('order_items');
        Schema::create('order_items',
			function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('order_id');
				$table->unsignedBigInteger('product_id');
				$table->integer('qty');
				$table->decimal('base_price', 16, 2)->default(0);
				$table->decimal('base_total', 16, 2)->default(0);
				$table->decimal('tax_amount', 16, 2)->default(0);
				$table->decimal('tax_percent', 16, 2)->default(0);
				$table->decimal('discount_amount', 16, 2)->default(0);
				$table->decimal('discount_percent', 16, 2)->default(0);
				$table->decimal('sub_total', 16, 2)->default(0);
				$table->string('sku');
				$table->string('type');
				$table->string('name');
				$table->string('weight');
				$table->json('attributes');
				$table->timestamps();

				$table->foreign('order_id')->references('id')->on('orders');
				$table->foreign('product_id')->references('id')->on('products');
				$table->index('sku');
			}
        );
        Schema::dropIfExists('payments');
        Schema::create('payments',function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('order_id');
				$table->string('number')->unique();
				$table->decimal('amount', 16, 2)->default(0);
				$table->string('method');
				$table->string('token')->nullable();
				$table->json('payloads')->nullable();
				$table->string('payment_type')->nullable();
				$table->string('va_number')->nullable();
				$table->string('vendor_name')->nullable();
				$table->string('biller_code')->nullable();
				$table->string('bill_key')->nullable();
				$table->softDeletes();
				$table->timestamps();
				
				$table->foreign('order_id')->references('id')->on('orders');
				$table->index('number');
				$table->index('method');
				$table->index('token');
				$table->index('payment_type');
			}
        );
        Schema::dropIfExists('shipments');
        Schema::create('shipments',function (Blueprint $table) {
				$table->bigIncrements('id');
				$table->unsignedBigInteger('user_id');
				$table->unsignedBigInteger('order_id');
				$table->string('track_number')->nullable();
				$table->string('status');
				$table->integer('total_qty');
				$table->integer('total_weight');
				$table->string('first_name');
				$table->string('last_name');
				$table->string('address1')->nullable();
				$table->string('address2')->nullable();
				$table->string('phone')->nullable();
				$table->string('email')->nullable();
				$table->string('city_id')->nullable();
				$table->string('province_id')->nullable();
				$table->integer('postcode')->nullable();
				$table->unsignedBigInteger('shipped_by')->nullable();
				$table->datetime('shipped_at')->nullable();
				$table->softDeletes();
				$table->timestamps();

				$table->foreign('user_id')->references('id')->on('users');
				$table->foreign('order_id')->references('id')->on('orders');
				$table->foreign('shipped_by')->references('id')->on('users');
				$table->index('track_number');
			}
		);
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
