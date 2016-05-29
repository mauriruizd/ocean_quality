<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class APIsController extends Controller {

	public function lunaActual()
	{
		header("Access-Control-Allow-Origin: *");
		// Llamada curl a calendario-365.es
		$homeUrl = 'http://www.calendario-365.es';
		$url = $homeUrl.'/luna/fase-lunar-actual.html';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curlResult = curl_exec($ch);
		curl_close($ch);
		$div = '<div class="moon_on_page">';
		$divPos = strpos($curlResult, $div);
		$divClosePos = strpos($curlResult, '</div>', $divPos);
		$moonDiv = substr($curlResult, $divPos, ($divClosePos - $divPos) );
		return str_replace('/images/', $homeUrl.'/images/', $moonDiv);
	}
}
