<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cust_name', 191);
            $table->unsignedBigInteger('product_id')->index('price_requests_product_id_foreign');
            $table->string('cust_phone', 191);
            $table->string('ip', 191);
            $table->string('purpose', 191);
            $table->string('cust_notes', 191)->nullable();
            $table->boolean('status');
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
        Schema::dropIfExists('price_requests');
    }
}
