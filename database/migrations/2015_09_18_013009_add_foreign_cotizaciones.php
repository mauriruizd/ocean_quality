<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignCotizaciones extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('cotizaciones', function(Blueprint $table)
		{
			$table->foreign('adm_cod')->references('id')->on('administradores');
			$table->foreign('moneda_cod')->references('id')->on('monedas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('cotizaciones', function(Blueprint $table)
		{
			//
		});
	}

}
