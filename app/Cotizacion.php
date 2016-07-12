<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotizacion extends Model {

    protected $table = 'cotizaciones';
    protected $fillable = ['moneda_cod', 'valor', 'adm_cod'];

    public function administrador(){
        return $this->belongsTo('App\Administrador', 'adm_cod', 'id');
    }

    public function moneda(){
        return $this->hasOne('App\Moneda', 'moneda_cod', 'id');
    }


}
