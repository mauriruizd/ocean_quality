<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
		// $this->call('UserTableSeeder');
		$this->call('CategoriasTableSeeder');
		$this->call('DepartamentosTableSeeder');
		$this->call('AdminTableSeeder');
		DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
		Model::reguard();
	}

}

class DepartamentosTableSeeder extends Seeder {
	public function run() {
		DB::table('departamentos')->truncate();
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
		DB::table('categorias')->truncate();
		$categorias = ['Semillas', 'Fertilizantes', 'Sistemas de riego', 'Agroquímicos', 'Ambientes protegidos'];
		foreach($categorias as $categoria) {
			\App\Categoria::create(['nombre' => $categoria]);
		}
	}
}

class AdminTableSeeder extends  Seeder {
	public function run() {
		DB::table('administradores')->truncate();
		\App\Administrador::create([
			'nombre' => 'Ocean',
			'email' => 'admin@oceanquality.net',
			'password' => \Illuminate\Support\Facades\Hash::make('ocean123')
		]);
	}
}
