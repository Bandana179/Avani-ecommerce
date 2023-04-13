<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('uuid');
            $table->biginteger('category_id')->nullable()->unsigned();
            $table->biginteger('subcategory_id')->nullable()->unsigned();
            $table->biginteger('child_category_id')->nullable()->unsigned();
            $table->string('product_name');
            $table->string('product_description');
            $table->string('product_image');
            $table->integer('product_price');
            $table->string('product_status');
            $table->string('product_feature');
            $table->string('other_images');
            $table->string('product_date');
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
};
