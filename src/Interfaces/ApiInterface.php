<?php

namespace App\Interfaces;

interface ApiInterface
{
    public function fetchData(string $url, array $options): array;
}