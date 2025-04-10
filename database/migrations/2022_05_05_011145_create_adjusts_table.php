<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdjustsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adjusts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type', 191);
            $table->unsignedBigInteger('product_id')->index('adjusts_product_id_foreign');
            $table->integer('qty');
            $table->text('notes')->nullable();
            $table->dateTime('adjusted_at');
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
        Schema::dropIfExists('adjusts');
    }
}
