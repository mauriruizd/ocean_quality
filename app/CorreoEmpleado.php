<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class CorreoEmpleado extends Model {

	protected $table = 'correo_empleados';
    protected $fillable = ['correo', 'empleado_cod'];

    public function empleado(){
        return $this->belongsTo('App\Empleado', 'empleado_cod', 'id');
    }

}
