<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposProductos extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->string('epoca');
			$table->string('ciclo_promedio');
			$table->string('segmento');
			$table->string('envase');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->dropColumn('epoca');
			$table->dropColumn('ciclo_promedio');
			$table->dropColumn('segmento');
			$table->dropColumn('envase');
		});
	}

}
