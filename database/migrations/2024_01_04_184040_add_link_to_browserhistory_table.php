<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLinkToBrowserhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('browserhistories', function (Blueprint $table) {
            $table->text('link');
            $table->text('asin', 10);
            $table->longText('product_detail');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('browserhistories', function (Blueprint $table) {
            //
        });
    }
}
