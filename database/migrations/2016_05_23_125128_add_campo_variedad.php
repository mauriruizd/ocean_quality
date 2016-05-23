<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCampoVariedad extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('productos', function(Blueprint $table)
		{
			$table->string('variedad')->after('descripcion');
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
			$table->dropColumn('variedad');
		});
	}

}
