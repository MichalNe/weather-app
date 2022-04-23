<?php
declare(strict_types=1);

namespace App\Domains\Weather\DomainModel;

use Carbon\CarbonImmutable;

class WeatherInformationFactory
{
    public static function create(array $weatherData): WeatherInformation
    {
        return new WeatherInformation(
            $weatherData['location']['name'],
            $weatherData['location']['country'],
            $weatherData['current']['temp_c'],
            $weatherData['current']['feelslike_c'],
            $weatherData['current']['condition']['text'],
            $weatherData['current']['condition']['icon'],
            $weatherData['current']['wind_dir'],
            $weatherData['current']['pressure_mb'],
            $weatherData['current']['uv'],
            CarbonImmutable::createFromFormat('Y-m-d H:i', $weatherData['location']['localtime'])
        );
    }
}