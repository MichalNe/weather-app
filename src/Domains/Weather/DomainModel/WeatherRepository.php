<?php

namespace App\Domains\Weather\DomainModel;

use App\Domains\Weather\ReadModel\WeatherDTO;

interface WeatherRepository
{
    public function getWeatherData(): WeatherDTO;

    public function setWeatherData(WeatherInformation $weatherInformation): void;
}