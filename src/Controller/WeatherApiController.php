<?php

namespace App\Controller;

use App\Domains\Weather\Application\Command\SetWeatherData;
use App\Domains\Weather\Application\WeatherApiService;
use App\Domains\Weather\ReadModel\Query\GetWeatherData;
use App\Domains\Weather\ReadModel\WeatherReadModel;
use App\Tools\Tools;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherApiController extends AbstractController
{
    private const DEFAULT_PARAMETER = 'Warsaw';

    public function __construct(
        private WeatherApiService $weatherApiService,
        private WeatherReadModel $weatherReadModel
    ) {}

    #[Route('/api/weather/current/{parameter}', name: 'app_weather_api', methods: ['GET'])]
    public function getWeather(string $parameter = self::DEFAULT_PARAMETER): Response
    {
        $query = new GetWeatherData($parameter);

        $weatherData = $this->weatherReadModel->getWeatherData($query);

        return new Response(Tools::serialize($weatherData));
    }

    #[Route('/api/weather/{parameter}', name: 'app_weather_api_set_data', methods: ['POST'])]
    public function setWeather(string $parameter = self::DEFAULT_PARAMETER): Response
    {
        $command = new SetWeatherData($parameter);

        return $this->weatherApiService->setWeather($command);
    }
}
