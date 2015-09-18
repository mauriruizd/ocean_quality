<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenProductosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagen_productos', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('img_url', 130);
			$table->integer('producto_cod')->unsigned();
			$table->timestamps();

			$table->foreign('producto_cod')->references('id')->on('productos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imagen_productos');
	}

}
