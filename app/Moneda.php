<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model {

	protected $table = 'monedas';
    protected $fillable = ['moneda', 'sigla'];

    public function cotizaciones(){
        return $this->hasMany('App\Cotizacion', 'moneda_cod', 'id');
    }
}