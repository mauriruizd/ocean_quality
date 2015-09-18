<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cotizaciones', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('adm_cod')->unsigned();
			$table->integer('moneda_cod')->unsigned();
			$table->double('valor', 15, 2);
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
		Schema::drop('cotizacions');
	}

}
