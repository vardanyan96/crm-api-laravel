<?php

namespace App\Enums;

enum RolesEnum: string
{
    case OWNER = 'owner';

    case MANAGER = 'manager';

    public function label(): string
    {
        return match ($this) {
            static::OWNER => __('ui.Owner'),
            static::MANAGER => __('ui.Manager'),
        };
    }
}
