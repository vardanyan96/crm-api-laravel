<?php

namespace App\Services;

use danog\MadelineProto\EventHandler;

class TelegramEventHandler extends EventHandler
{
    public function onUpdateNewMessage(array $update)
    {
        if (isset($update['message']['message'])) {
            $message = $update['message']['message'];
            $userId = $update['message']['from_id']['user_id'] ?? null;

            // Логика обработки сообщений
            logger("Новое сообщение от {$userId}: {$message}");

            // Пример ответа
            $this->messages->sendMessage([
                'peer' => $userId,
                'message' => "Привет! Вы написали: {$message}"
            ]);
        }
    }
}
