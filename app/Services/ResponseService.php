<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ResponseService
{
    public function prepareResponseFromEndpoints(): string
    {
        $result = '';
        foreach (config('telegram.endpoints') as $key => $endpoint) {
            try {
                $response = Http::timeout(10)->get($endpoint);

                if ($response->successful()) {
                    $result .= view('telegram', [
                        'endpoint' => $key,
                        'date' => addcslashes($response['date'], '.'),
                        'report' => $response['report']
                    ])->render();
                } else {
                    $result .= view('telegram', [
                        'endpoint' => $key,
                        'error' => 'Не ответил'
                    ])->render();
                }
            } catch (Exception $e) {
                $result .= view('telegram', [
                    'endpoint' => $key,
                    'error' => 'Не ответил'
                ])->render();

                Log::error(__METHOD__, [
                    'message' => $e->getMessage()
                ]);
            }
        }

        return $result;
    }
}
