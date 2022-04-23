<?php

namespace App\Controller;

use App\Domains\Weather\Application\Command\SetWeatherData;
use App\Domains\Weather\Application\WeatherApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherApiController extends AbstractController
{
    private const DEFAULT_PARAMETER = 'Warsaw';

    public function __construct(
        private WeatherApiService $weatherApiService,
    ) {}

    #[Route('/api/weather/current/{parameter}', name: 'app_weather_api', methods: ['GET'])]
    public function index(string $parameter = self::DEFAULT_PARAMETER): Response
    {
        return new Response('');
    }

    #[Route('/api/weather/{parameter}', name: 'app_weather_api_set_data', methods: ['POST'])]
    public function setWeather(string $parameter = self::DEFAULT_PARAMETER): Response
    {
        $command = new SetWeatherData($parameter);

        return $this->weatherApiService->setWeather($command);
    }
}
