<?php

namespace App\Domains\Weather\DomainModel;

use App\Domains\Weather\ReadModel\WeatherDTO;
use Carbon\CarbonImmutable;

class WeatherDTOFactory
{
    public static function create(array $data): WeatherDTO
    {
        return new WeatherDTO(
            $data['name'],
            $data['country'],
            $data['temperature'],
            $data['feels_like_temperature'],
            $data['weather_description'],
            $data['weather_icon'],
            $data['wind_direction'],
            $data['pressure'],
            $data['uv_index'],
            new CarbonImmutable($data['data_time']),
        );
    }
}