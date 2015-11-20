<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model {

	protected $table = 'productos';
    protected $fillable = ['nombre', 'descripcion', 'adm_cod', 'cat_cod', 'subcat_cod', 'slug', 'epoca', 'ciclo_promedio', 'segmento', 'envase'];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'cat_cod', 'id');
    }

    public function subcategoria(){
        return $this->belongsTo('App\Subcategoria', 'subcat_cod', 'id');
    }

    public function imagenes(){
        return $this->hasMany('App\ImagenProducto', 'producto_cod', 'id');
    }

    public function proveedorProducto(){
        return $this->hasMany('App\ProveedorProducto', 'cod_producto', 'id');
    }

}
