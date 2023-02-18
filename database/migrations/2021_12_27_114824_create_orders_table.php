<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->text('shipping_address');
            $table->integer('division_id')->nullable();
            $table->integer('district_id')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('additional_message')->nullable();
            $table->integer('product_finalprice')->nullable();
            $table->integer('price_with_coupon')->nullable();
            $table->integer('is_paid')->default(0);
            $table->integer('payment_id')->nullable()->comment('1 for Bkash and 2 for Rocket and 3 for COD');
            $table->string('transaction_id')->nullable(); 
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
        Schema::dropIfExists('orders');
    }
}
