<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TelefonoEmpleado extends Model {

    protected $table = 'telefono_empleados';
    protected $fillable = ['telefono', 'empleado_cod'];

    public function empleado(){
        return $this->belongsTo('App\Empleado', 'empleado_cod', 'id');
    }

}
