<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model {

	protected $table = 'categorias';
    protected $fillable = ['nombre'];

    public function subcategorias(){
        return $this->hasMany('App\Subcategoria', 'cat_cod', 'id');
    }
}
