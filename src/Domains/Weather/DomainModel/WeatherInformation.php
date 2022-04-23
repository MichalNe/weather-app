<?php
declare(strict_types=1);

namespace App\Domains\Weather\DomainModel;

use Carbon\CarbonImmutable;

class WeatherInformation
{
    public function __construct(
        private string $name,
        private string $country,
        private float $temp,
        private float $feelsLikeTemp,
        private string $weatherDescription,
        private string $weatherIcon,
        private string $windDirection,
        private float $pressure,
        private float $uvIndex,
        private CarbonImmutable $dataTime
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getTemp(): float
    {
        return $this->temp;
    }

    public function getFeelsLikeTemp(): float
    {
        return $this->feelsLikeTemp;
    }

    public function getWeatherDescription(): string
    {
        return $this->weatherDescription;
    }

    public function getWeatherIcon(): string
    {
        return $this->weatherIcon;
    }

    public function getWindDirection(): string
    {
        return $this->windDirection;
    }

    public function getPressure(): float
    {
        return $this->pressure;
    }

    public function getUvIndex(): float
    {
        return $this->uvIndex;
    }

    public function getDataTime(): CarbonImmutable
    {
        return $this->dataTime;
    }
}