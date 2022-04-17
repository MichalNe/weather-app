<?php

namespace App\Controller;

use App\Domains\Weather\Exception\WeatherApiException;
use App\Domains\Weather\Service\WeatherApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WeatherApiController extends AbstractController
{
    private const DEFAULT_PARAMETER = 'Warsaw';

    public function __construct(
        private WeatherApiService $weatherApiService,
    ) {}

    /**
     * @throws WeatherApiException
     */
    #[Route('/api/weather/current/{parameter}', name: 'app_weather_api', methods: ['GET'])]
    public function index(string $parameter = self::DEFAULT_PARAMETER): Response
    {
        $this->weatherApiService->fetchData([$parameter]);
    }
}
