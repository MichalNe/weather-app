<?php
declare(strict_types=1);

namespace App\Domains\Weather\Service;

use App\Interfaces\ApiInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class WeatherApiService implements ApiInterface
{
    private const API_URL = 'http://api.weatherapi.com/v1/';

    public function __construct(
        private HttpClientInterface $httpClient,
    ) {}


    public function fetchData(string $url, array $options): array
    {

    }
}