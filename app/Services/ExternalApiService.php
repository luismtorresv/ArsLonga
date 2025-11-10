<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ExternalApiService
{
    public static function getProducts()
    {
        try {
            $response = Http::timeout(10)->get('http://insumax.zone.id/api/products');

            if ($response->successful()) {
                return $response->json()['data'] ?? $response->json();
            }

            return [];
        } catch (\Exception $e) {
            return [];
        }
    }
}
