<?php

namespace App\Enums;

enum TaskStatus: string
{
    case PENDING = 'pending';
    case IN_PROGRESS = 'in_progress';
    case COMPLETED = 'completed';

    public function label(): string
    {
        return match ($this) {
            self::PENDING => 'В ожидании',
            self::IN_PROGRESS => 'В процессе',
            self::COMPLETED => 'Завершено',
        };
    }

    public static function options(): array
    {
        return [
            self::PENDING->value => self::PENDING->label(),
            self::IN_PROGRESS->value => self::IN_PROGRESS->label(),
            self::COMPLETED->value => self::COMPLETED->label(),
        ];
    }
}