<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProveedorProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('proveedor_productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('cod_producto', false, true);
			$table->integer('cod_proveedor', false, true);

			$table->foreign('cod_producto')->references('id')->on('productos');
			$table->foreign('cod_proveedor')->references('id')->on('proveedores');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('proveedor_productos');
	}

}
