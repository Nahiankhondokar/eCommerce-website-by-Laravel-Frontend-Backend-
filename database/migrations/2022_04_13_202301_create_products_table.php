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
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_eng');
            $table->string('product_name_hin');
            $table->string('product_slug_eng');
            $table->string('product_slug_hin');
            $table->integer('product_code');
            $table->integer('product_qty');
            $table->string('product_tag_eng');
            $table->string('product_tag_hin');
            $table->integer('product_size_eng');
            $table->integer('product_size_hin');
            $table->string('product_color_eng');
            $table->string('product_color_hin');
            $table->integer('selling_price');
            $table->integer('discount_price') -> nullable();
            $table->string('short_desc_eng') -> nullable();
            $table->string('short_desc_hin') -> nullable();
            $table->longText('long_desc_eng') -> nullable();
            $table->longText('long_desc_hin') -> nullable();
            $table->string('product_thamnail') -> nullable();
            $table->integer('hot_deal_product') -> nullable();
            $table->integer('feature_product') -> nullable();
            $table->integer('special_offer') -> nullable();
            $table->integer('special_deal') -> nullable();
            $table->integer('status') -> default(0);
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
