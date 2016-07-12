<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenNoticia extends Model {

	protected $table = 'imagen_noticias';
    protected $fillable = ['img_url', 'noticia_cod'];

    public function noticia(){
        return $this->hasOne('App\Noticia', 'noticia_cod', 'id');
    }

}
