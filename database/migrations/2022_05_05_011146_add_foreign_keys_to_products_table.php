<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign(['brand_id'])->references(['id'])->on('brands')->onDelete('CASCADE');
            $table->foreign(['product_type_id'])->references(['id'])->on('product_types')->onDelete('CASCADE');
            $table->foreign(['category_id'])->references(['id'])->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign('products_brand_id_foreign');
            $table->dropForeign('products_product_type_id_foreign');
            $table->dropForeign('products_category_id_foreign');
        });
    }
}
