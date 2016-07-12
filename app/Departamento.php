<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model {

	protected $fillable = ['nombre'];

	public function zonas(){
		return $this->hasMany('App\Zona', 'depto_cod', 'id');
	}
}
