<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagenNoticiasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('imagen_noticias', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('img_url', 130);
			$table->integer('noticia_cod')->unsigned();
			$table->timestamps();

			$table->foreign('noticia_cod')->references('id')->on('noticias');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('imagen_noticias');
	}

}
