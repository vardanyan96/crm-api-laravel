<?php

namespace App\Enums;

enum CardStatusEnum: int
{
    case NEW = 0;
    case REVIEWED = 1;
    case CLIENT_WAITING = 2;
    case REJECTED = 3;
    case REPEAT = 4;
    case NEGOTIATION = 5;
    case ARCHIVE = 6;

    public function label(): string
    {
        return match ($this) {
            self::NEW => __('ui.status.new'),
            self::REVIEWED => __('ui.status.reviewed'),
            self::CLIENT_WAITING => __('ui.status.client_waiting'),
            self::REJECTED => __('ui.status.rejected'),
            self::REPEAT => __('ui.status.repeat'),
            self::NEGOTIATION => __('ui.status.negotiation'),
            self::ARCHIVE => __('ui.status.archive'),
        };
    }
}
