<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChallanProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challan_product', function (Blueprint $table) {
            $table->unsignedBigInteger('challan_id')->index('challan_product_challan_id_foreign');
            $table->unsignedBigInteger('product_id')->index('challan_product_product_id_foreign');
            $table->integer('qty');
            $table->string('unit', 191)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('challan_product');
    }
}
