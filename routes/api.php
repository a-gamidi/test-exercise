<?php

use App\Http\Controllers\TelegramController;
use Illuminate\Support\Facades\Route;

Route::get('/send/{chatId}', [TelegramController::class, 'send']);
