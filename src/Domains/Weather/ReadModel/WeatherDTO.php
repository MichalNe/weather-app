<?php

declare(strict_types=1);

namespace App\Domains\Weather\ReadModel;

use Carbon\CarbonImmutable;

class WeatherDTO
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

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['location']['name'],
            $data['location']['country'],
            $data['current']['temp_c'],
            $data['current']['feelslike_c'],
            $data['current']['condition']['text'],
            $data['current']['condition']['icon'],
            $data['current']['wind_dir'],
            $data['current']['pressure_mb'],
            $data['current']['uv'],
            CarbonImmutable::createFromFormat('Y-m-d H:i', $data['location']['localtime'])
        );
    }

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