<?php namespace App;
use Cmfcmf\OpenWeatherMap;

class ApiClima{

    private $api;
    private $lang;
    private $units;

    public function __construct($lang = 'es', $units = 'imperial'){
        $this->lang = $lang;
        $this->units = $units;
        $this->api = new OpenWeatherMap();
    }

    public function getWeather($city = 'Asuncion'){
        return $this->api->getWeather($city, $this->units, $this->lang);
    }

    public function getTemp($city = 'Asuncion'){
        $temp = $this->getWeather($city)->temperature->getValue();
        $temp = $this->toCelsius($temp);
        return [
            'precisa' => $temp,
            'redondeada' => round($temp, 2)
        ];
    }

    private function toCelsius($far){
        return ($far - 32) / 1.8;
    }
}