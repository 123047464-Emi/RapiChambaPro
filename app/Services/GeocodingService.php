<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeocodingService
{
    public static function obtenerCoordenadas($direccion)
    {
        $response = Http::withHeaders([
            'User-Agent' => 'RapiChambaApp/1.0'
        ])->get('https://nominatim.openstreetmap.org/search', [
            'q' => $direccion,
            'format' => 'json',
            'limit' => 1
        ]);

        if ($response->successful() && count($response->json()) > 0) {
            return [
                'lat' => $response[0]['lat'],
                'lon' => $response[0]['lon']
            ];
        }

        return null;
    }
}