<?php
declare(strict_types=1);

namespace App\Domains\Weather\DomainModel;

use App\Entity\Weather;

class WeatherEntityFactory
{
    public static function create(WeatherInformation $weatherInformation): Weather
    {
        $weather = new Weather();

        $weather->setName($weatherInformation->getName());
        $weather->setCountry($weatherInformation->getCountry());
        $weather->setTemperature($weatherInformation->getTemp());
        $weather->setFeelsLikeTemperature($weatherInformation->getFeelsLikeTemp());
        $weather->setWeatherDescription($weatherInformation->getWeatherDescription());
        $weather->setWeatherIcon($weatherInformation->getWeatherIcon());
        $weather->setWindDirection($weatherInformation->getWindDirection());
        $weather->setPressure($weatherInformation->getPressure());
        $weather->setUvIndex($weatherInformation->getUvIndex());
        $weather->setDataTime($weatherInformation->getDataTime());

        return $weather;
    }
}