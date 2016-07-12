<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenProducto extends Model {

	protected $table = 'imagen_productos';
    protected $fillable = ['img_url', 'producto_cod'];

    public function producto(){
        return $this->belongsTo('App\Producto', 'producto_cod', 'id');
    }

}
