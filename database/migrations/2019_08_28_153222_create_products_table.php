<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->timestamps();
            $table->text('product_name');
            $table->text('author_name');
            $table->text('company_name');
            $table->string('size')->nullable();
            $table->string('release_date')->nullable();
            $table->text('translator_name');
            $table->text('introduction');
            $table->text('product_image');
            $table->integer('product_price');
            $table->string('cover_type')->nullable();
            $table->string('product_signal');
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
