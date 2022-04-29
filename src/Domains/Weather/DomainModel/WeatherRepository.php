<?php

namespace App\Domains\Weather\DomainModel;

use App\Domains\Weather\Application\Query\GetWeatherData;
use App\Domains\Weather\ReadModel\WeatherDTO;

interface WeatherRepository
{
    public function getWeatherData(GetWeatherData $query): WeatherDTO;

    public function setWeatherData(WeatherInformation $weatherInformation): void;
}