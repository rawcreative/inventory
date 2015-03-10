<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInventoryAssembliesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('inventory_assemblies', function (Blueprint $table) {
            
            $table->increments('id');

            $table->integer('inventory_id', false, true);
            $table->integer('part_id', false, true);
            $table->integer('quantity')->nullable();
            $table->integer('depth', false, true);
            
            $table->foreign('inventory_id')->references('id')->on('inventories')->onDelete('cascade');
            $table->foreign('part_id')->references('id')->on('inventories')->onDelete('cascade');

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('inventory_assemblies');
	}

}
