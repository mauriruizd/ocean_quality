<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model {

    protected $table = 'empleados';
    protected $fillable = ['nombre', 'zona_cod', 'cargo'];

    public function zona(){
        return $this->hasOne('App\Zona', 'zona_cod', 'id');
    }

    public function telefonos(){
        return $this->hasMany('App\TelefonoEmpleado', 'empleado_cod', 'id');
    }

    public function correos(){
        return $this->hasMany('App\CorreoEmpleado', 'empleado_cod', 'id');
    }
}
