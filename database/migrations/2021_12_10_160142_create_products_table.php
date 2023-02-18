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
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug');
            $table->text('short_desc')->nullable();
            $table->text('desc')->nullable();
            $table->string('tags')->nullable();
            $table->unsignedInteger('quantity');
            $table->integer('regular_price')->default(0);
            $table->integer('offer_price')->nullable();
            $table->string('sku_code')->nullable();
            $table->integer('product_type')->default(0)->comment('0 for new and 1 for old');
            $table->integer('category_id');
            $table->integer('brand_id');
            $table->integer('featured_item')->default(0)->comment('0 is for Normal and 1 is for Featured');
            $table->integer('status')->default(0)->comment('0 is for InActive and 1is for Active');
            $table->string('image')->nullable();
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
