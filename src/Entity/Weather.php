<?php

namespace App\Entity;

use App\Repository\WeatherRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WeatherRepository::class)]
class Weather
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $name;

    #[ORM\Column(type: 'string', length: 255)]
    private $country;

    #[ORM\Column(type: 'float')]
    private $temperature;

    #[ORM\Column(type: 'float')]
    private $feels_like_temperature;

    #[ORM\Column(type: 'string', length: 255)]
    private $weather_description;

    #[ORM\Column(type: 'string', length: 255)]
    private $weather_icon;

    #[ORM\Column(type: 'string', length: 255)]
    private $wind_direction;

    #[ORM\Column(type: 'float')]
    private $pressure;

    #[ORM\Column(type: 'float')]
    private $uv_index;

    #[ORM\Column(type: 'date')]
    private $data_time;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTemperature(): ?float
    {
        return $this->temperature;
    }

    public function setTemperature(float $temperature): self
    {
        $this->temperature = $temperature;

        return $this;
    }

    public function getFeelsLikeTemperature(): ?float
    {
        return $this->feels_like_temperature;
    }

    public function setFeelsLikeTemperature(float $feels_like_temperature): self
    {
        $this->feels_like_temperature = $feels_like_temperature;

        return $this;
    }

    public function getWeatherDescription(): ?string
    {
        return $this->weather_description;
    }

    public function setWeatherDescription(string $weather_description): self
    {
        $this->weather_description = $weather_description;

        return $this;
    }

    public function getWeatherIcon(): ?string
    {
        return $this->weather_icon;
    }

    public function setWeatherIcon(string $weather_icon): self
    {
        $this->weather_icon = $weather_icon;

        return $this;
    }

    public function getWindDirection(): ?string
    {
        return $this->wind_direction;
    }

    public function setWindDirection(string $wind_direction): self
    {
        $this->wind_direction = $wind_direction;

        return $this;
    }

    public function getPressure(): ?float
    {
        return $this->pressure;
    }

    public function setPressure(float $pressure): self
    {
        $this->pressure = $pressure;

        return $this;
    }

    public function getUvIndex(): ?float
    {
        return $this->uv_index;
    }

    public function setUvIndex(float $uv_index): self
    {
        $this->uv_index = $uv_index;

        return $this;
    }

    public function getDataTime(): ?DateTimeInterface
    {
        return $this->data_time;
    }

    public function setDataTime(DateTimeInterface $data_time): self
    {
        $this->data_time = $data_time;

        return $this;
    }
}
