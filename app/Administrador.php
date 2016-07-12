<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model {

	protected $table = 'administradores';
    protected $fillable = ['nombre', 'email', 'clave'];

    public function productos(){
        return $this->hasMany('App\Productos', 'adm_cod', 'id');
    }

    public function noticias(){
        return $this->hasMany('App\Noticias', 'adm_cod', 'id');
    }

    public function banners(){
        return $this->hasMany('App\Banners', 'adm_cod', 'id');
    }

    public function cotizaciones(){
        return $this->hasMany('App\Cotizaciones', 'adm_cod', 'id');
    }

}
