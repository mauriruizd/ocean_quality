<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDeptoCodForeign extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('zonas', function(Blueprint $table)
		{

			$table->foreign('depto_cod')->references('id')->on('departamentos');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('zonas', function(Blueprint $table)
		{
			$table->dropForeign('depto_cod');
		});
	}

}
