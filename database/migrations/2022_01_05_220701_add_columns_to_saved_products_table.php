<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToSavedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saved_products', function (Blueprint $table) {
            $table->string('quantity')->after('product_id');
            $table->string('size')->after('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saved_products', function (Blueprint $table) {
            $table->dropColumn('quantity');
            $table->dropColumn('size');
        });
    }
}
