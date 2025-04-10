<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsconfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smsconfigs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('api_url', 191);
            $table->string('username', 191);
            $table->string('password', 191);
            $table->text('delivery_agent_number_csv');
            $table->text('boss_notify_number_csv');
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
        Schema::dropIfExists('smsconfigs');
    }
}
