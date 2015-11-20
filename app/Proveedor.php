<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model {

	protected $table = 'proveedores';

    protected $fillable = ['nombre'];

    public function provProductos(){
        return $this->hasMany('App\ProveedorProducto', 'cod_proveedor', 'id');
    }

}
