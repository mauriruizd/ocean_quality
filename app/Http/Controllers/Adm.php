<?php namespace App\Http\Controllers;

use App\Administrador;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class Adm extends Controller {

	public function productos(){
        return Administrador::with('productos')->get();
    }

}
