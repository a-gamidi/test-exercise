<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class TelegramService
{
    public function send(string $chatId, string $text): Response
    {
        return Http::get(
            config('telegram.bot_url') .
            config('telegram.bot_token') .
            '/sendMessage',
            [
                'chat_id' => $chatId,
                'text' => $text
            ]
        );
    }
}
