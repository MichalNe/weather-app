<?php

namespace App\Interfaces;

interface ApiInterface
{
    public function fetchData(string $parameter): array;
}