<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

	protected $table = 'subcategorias';
    protected $fillable = ['nombre', 'cat_cod'];

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'cat_cod', 'id');
    }

    public function productos(){
        return $this->hasMany('App\Producto', 'subcat_cod', 'id');
    }

}
