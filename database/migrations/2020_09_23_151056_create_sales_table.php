<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string('region', 255)->nullable();
            $table->string('country', 255)->nullable();
            $table->string('item_type', 255)->notNullable();
            $table->string('sales_channel', 255)->nullable();
            $table->string('order_priority', 2)->notNullable();
            $table->date('order_date')->notNullable();
            $table->bigInteger('order_id')->nullable();
            $table->date('ship_date')->nullable();
            $table->integer('units_sold')->notNullable();
            $table->double('unit_price', 6, 2)->notNullable();
            $table->double('total_revenue', 6, 2)->notNullable();
            $table->double('total_cost', 9, 2)->notNullable();
            $table->string('total_profit', 9, 2)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
