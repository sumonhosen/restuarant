<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryProductOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_product_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->integer('quantity');
            $table->string('cat_product_id');
            $table->float('total_price');
            $table->integer('order_number');
            $table->string('order_type');
            $table->string('order_status');
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
        Schema::dropIfExists('category_product_orders');
    }
}
