<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWasteAndSampleToExpensecategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('expensecategories', function (Blueprint $table) {
            $table->string('waste')->nullable();
            $table->string('sample')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('expensecategories', function (Blueprint $table) {
            $table->dropColumn(['waste', 'sample']);
        });
    }
}
