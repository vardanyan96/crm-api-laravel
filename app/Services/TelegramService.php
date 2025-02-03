<?php

namespace App\Services;

use danog\MadelineProto\API;
use Revolt\EventLoop;
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
        // Регистрируем задачу в событийном цикле
        EventLoop::queue(function () {
            $this->api->start();
        });

        // Запускаем событийный цикл
        EventLoop::run();
    }
}
