<?php

namespace App\Interfaces;

interface ApiInterface
{
    public function fetchData(array $options): array;
}