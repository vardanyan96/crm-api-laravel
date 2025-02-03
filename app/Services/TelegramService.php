<?php

namespace App\Services;

use danog\MadelineProto\API;
class TelegramService
{
    protected $api;

    public function __construct()
    {
        $sessionDir = public_path('telegram/sessions/user_session');

        // Проверка существования директории и создание при необходимости
        if (!file_exists($sessionDir)) {
            mkdir($sessionDir, 0777, true);
        }

        $this->api = new API($sessionDir);
    }

    public function login()
    {
        $this->api->start();
    }

    public function listen()
    {
        // Новый способ запуска обработчика событий
        API::startAndLoop(TelegramEventHandler::class);
    }
}
