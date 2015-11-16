<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		// $this->call('UserTableSeeder');
		$this->call('DepartamentosTableSeeder');
	}

}

class DepartamentosTableSeeder extends Seeder {
	public function run() {
		$departamentos = ['Concepcion', 'San Pedro', 'Cordillera', 'Guaira', 'Caaguazu', 'Caazapa',
		'Itapua', 'Misiones', 'Paraguari', 'Alto Parana', 'Central', 'Neembucu', 'Amambay', 'Canindeyu',
		'Presidente Hayes', 'Boqueron', 'Alto Paraguay'];

		foreach($departamentos as $departamento) {
			\App\Departamento::create(['nombre' => $departamento]);
		}
	}
}

class CategoriasTableSeeder extends Seeder {
	public function run() {
		$categorias = ['Semillas', 'Fertilizantes', 'Sistemas de riego', 'Agroquímicos', 'Ambientes protegidos'];
		foreach($categorias as $categoria) {
			\App\Categoria::create(['nombre' => $categoria]);
		}
	}
}
