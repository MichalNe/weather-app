<?php
declare(strict_types=1);

namespace App\Domains\Weather\ReadModel;

use App\Domains\Weather\DomainModel\WeatherRepository;
use App\Domains\Weather\ReadModel\Query\GetWeatherData;

class WeatherReadModel
{

    public function __construct(
        private WeatherRepository $weatherRepository
    ) {}

    public function getWeatherData(GetWeatherData $query): WeatherDTO
    {
        return $this->weatherRepository->getWeatherData($query);
    }
}