<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class APIsController extends Controller {

	protected $homeURL = '';

	public function __construct()
	{
		header("Access-Control-Allow-Origin: *");
	}

	public function lunaActual()
	{
		// Llamada curl a calendario-365.es
		$this->homeURL = 'http://www.calendario-365.es';
		$curlResult = $this->curlHTMLGetter('/luna/fase-lunar-actual.html');
		$moonDiv = $this->extractDOMElement($curlResult, '<div class="moon_on_page">', '</div>');
		return $this->absoluteURLGetter('/images/', $moonDiv);
	}

	public function temperaturasActuales()
	{
		$this->homeURL = 'http://www.accuweather.com/es/py';
		$curlResult = $this->curlHTMLGetter('/paraguay-weather#menu-country');
		$contentLeftUl = $this->extractDOMElement($curlResult, '<ul class="top-cities lt">', '</ul>');
		$contentRightUl = $this->extractDOMElement($curlResult, '<ul class="top-cities rt">', '</ul>');
		return $contentLeftUl.$contentRightUl;
	}

	private function extractDOMElement($htmlString, $openingTag, $closingTag)
	{
		$divPos = strpos($htmlString, $openingTag);
		$divClosePos = strpos($htmlString, $closingTag, $divPos);
		$result = substr($htmlString, $divPos, ($divClosePos - $divPos + strlen($closingTag)) );
		return $result;
	}

	private function curlHTMLGetter($path)
	{
		$ch = curl_init($this->homeURL.$path);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$curlResult = curl_exec($ch);
		curl_close($ch);
		return $curlResult;
	}

	private function absoluteURLGetter($find, $htmlString)
	{
		return str_replace($find, $this->homeURL.$find, $htmlString);
	}
}
