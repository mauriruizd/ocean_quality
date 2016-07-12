<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model {

    protected $table = 'zonas';
    protected $fillable = ['nombre', 'depto_cod'];

    public function empleados(){
        return $this->hasMany('App\Empleado', 'zona_cod', 'id');
    }

    public function departamento(){
        return $this->belongsTo('App\Departamento', 'depto_cod', 'id');
    }

}
