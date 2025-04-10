<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToChallanProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('challan_product', function (Blueprint $table) {
            $table->foreign(['challan_id'])->references(['id'])->on('challans');
            $table->foreign(['product_id'])->references(['id'])->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('challan_product', function (Blueprint $table) {
            $table->dropForeign('challan_product_challan_id_foreign');
            $table->dropForeign('challan_product_product_id_foreign');
        });
    }
}
