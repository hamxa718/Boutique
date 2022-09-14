<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductAttributeVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_attribute_variants', function (Blueprint $table) {
            $table->id();
            
            $table->integer('product_id');
            $table->integer('product_id');
            $table->string('variation')->nullable();
            $table->integer('product_attributes_id');
            $table->string('variant_title');
            $table->string('variant_price');
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
        Schema::dropIfExists('product_attribute_variants');
    }
}
