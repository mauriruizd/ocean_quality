<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSubcategoriaPadreField extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('subcategorias', function(Blueprint $table)
		{
			$table->integer('subcat_padre_cod', false, true)
				->nullable()
				->after('cat_cod');
			$table->foreign('subcat_padre_cod', 'subcategorias_subcategorias_fk')
				->references('id')
				->on('subcategorias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('subcategorias', function(Blueprint $table)
		{
			$table->dropForeign('subcategorias_subcategorias_fk');
			$table->dropColumn('subcat_padre_cod');
		});
	}

}
