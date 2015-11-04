<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ProveedorProducto extends Model {

	protected $table = 'proveedor_productos';
    protected $fillable = ['cod_producto', 'cod_proveedor'];

    public $timestamps = false;

    public function proveedor(){
        return $this->belongsTo('App\Proveedor', 'cod_proveedor', 'id');
    }

}
