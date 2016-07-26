<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model {

	protected $table = 'subcategorias';
    protected $fillable = ['nombre', 'cat_cod', 'subcat_padre_cod'];

    public function setSubcatPadreCodAttribute($val)
    {
        if($val == 0) {
            $this->attributes['subcat_padre_cod'] = null;
        } else {
            $this->attributes['subcat_padre_cod'] = $val;
        }
    }

    public function categoria(){
        return $this->belongsTo('App\Categoria', 'cat_cod', 'id');
    }

    public function productos(){
        return $this->hasMany('App\Producto', 'subcat_cod', 'id');
    }

    public function subcategoriasHijas()
    {
        return $this->hasMany('App\Subcategoria', 'subcat_padre_cod', 'id');
    }

    public function subcategoriaPadre()
    {
        return $this->belongsTo('App\Subcategoria', 'subcat_padre_cod', 'id');
    }

    public function scopePadre($q) {
        return $q->where('subcat_padre_cod', '=', null);
    }

}
