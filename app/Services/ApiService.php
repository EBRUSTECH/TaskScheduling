<?php

namespace App\Services;

use App\Models\Apilog;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ApiService
{
    public function getWeatherData()
    {
        return Cache::remember('weather_data', 3600, function () {
            try {
                $response = Http::get('https://api.weatherapi.com/v1/current.json', [
                    'key' => 'eea5ee4abd08473cba1192111241710',
                    'q' => 'Lagos'
                ]);

                if ($response->failed()) {
                    Log::error('Failed to fetch weather data from the API.');
                    return Cache::get('weather_data');
                }

                Apilog::create([
                    'endpoint' => 'https://api.weatherapi.com/v1/current.json',
                    'method' => 'GET',
                    'response' => $response->body()
                ]);

                return $response->json();

            } catch (\Exception $e) {
                Log::error('Error fetching weather data: ' . $e->getMessage());
                return Cache::get('weather_data');
            }
        });
    }
}
