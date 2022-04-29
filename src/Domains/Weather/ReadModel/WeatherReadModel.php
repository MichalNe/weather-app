<?php
declare(strict_types=1);

namespace App\Domains\Weather\ReadModel;

use App\Domains\Weather\Application\Query\GetWeatherData;
use App\Domains\Weather\DomainModel\WeatherRepository;

class WeatherReadModel
{

    public function __construct(
        private WeatherRepository $weatherRepository
    ) {}

    public function getWeatherData(GetWeatherData $query): WeatherDTO
    {
        $this->weatherRepository->getWeatherData($query);
    }
}