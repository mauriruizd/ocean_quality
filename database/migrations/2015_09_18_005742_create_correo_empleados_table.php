<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorreoEmpleadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('correo_empleados', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('correo', 150);
			$table->integer('empleado_cod')->unsigned();
			$table->timestamps();

			$table->foreign('empleado_cod')->references('id')->on('empleados');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('correo_empleados');
	}

}
