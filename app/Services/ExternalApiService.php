<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    public static function getProducts(): array
    {
        try {
            $response = Http::timeout(10)->get(config('api.external_team_api_url'));

            if ($response->successful()) {
                return $response->json()['data'] ?? $response->json();
            }

            return [];
        } catch (Exception $e) {
            return [];
        }
    }
}
