<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model {

    protected $table = 'banners';
    protected $fillable = ['titulo', 'link', 'adm_cod', 'imagen_url'];

    public function administrador(){
        return $this->belongsTo('App\Administrador', 'adm_cod', 'id');
    }

}
