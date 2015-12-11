<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddZonaForeign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('empleados', function(Blueprint $table)
		{
			$table->foreign('zona_cod')->references('id')->on('zonas');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('empleados', function(Blueprint $table)
		{
			$table->dropForeign('empleados_zona_cod_foreign');
		});
	}

}
