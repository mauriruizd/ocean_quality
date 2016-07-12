<?php namespace App\Http\Controllers;

use App\Administrador;
use App\ApiClima;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class Adm extends Controller {

	public function productos(){
        return Administrador::with('productos')->get();
    }

    public function clima(){
        $ciudad = Input::has('ciudad') ? Input::query('ciudad') : 'Ciudad del Este';
        $api = new ApiClima();
        return [
            'ciudad' => $ciudad,
            'temperatura_precisa' => $api->getTemp($ciudad)['precisa'],
            'temperatura_redondeada' => $api->getTemp($ciudad)['redondeada'],
            'clima' => $api->getWeather()->weather->description,
            'url_clima' =>  $api->getWeather()->weather->getIconUrl()
        ];
    }

}
