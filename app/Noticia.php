<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model {

	protected $table = 'noticias';
    protected $fillable = ['titulo', 'cuerpo', 'adm_cod'];

    public function imagenes(){
        return $this->hasMany('App\ImagenNoticia', 'notocia_cod', 'id');
    }

    public function administrador(){
        return $this->belongsTo('App\Administrador', 'adm_cod', 'id');
    }

}
