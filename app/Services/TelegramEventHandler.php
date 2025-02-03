<?php

namespace App\Services;
use danog\MadelineProto\EventHandler;

class TelegramEventHandler extends EventHandler
{
    public function onUpdateNewMessage(array $update): void
    {
        if (isset($update['message']['message'])) {
            $message = $update['message']['message'];
            $userId = $update['message']['from']['user_id'] ?? null;

            // Логирование или обработка сообщения
            logger("Новое сообщение от {$userId}: {$message}");
            echo "Новое сообщение от {$userId}: {$message}";
            // Пример ответа
            $this->messages->sendMessage([
                'peer' => $userId,
                'message' => "Привет! Вы написали: {$message}"
            ]);
        }
    }
}
