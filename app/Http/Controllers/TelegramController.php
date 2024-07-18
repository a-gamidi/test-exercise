<?php

namespace App\Http\Controllers;

use App\Services\ResponseService;
use App\Services\TelegramService;

class TelegramController extends Controller
{
    private TelegramService $telegramService;
    private ResponseService $responseService;

    public function __construct(TelegramService $telegramService, ResponseService $responseService)
    {
        $this->telegramService = $telegramService;
        $this->responseService = $responseService;
    }

    public function send(string $chatId)
    {
        $text = $this->responseService->prepareResponseFromEndpoints();

        $response = $this->telegramService->send($chatId, $text);

        return $response->json();
    }
}
