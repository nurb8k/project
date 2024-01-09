<?php

namespace App\Enums\Event;

enum Type: string
{
//    case Double = 'double';
    case GROUP = 'GROUP';
    case TEAM = 'TEAM';
//    case OTHER = 'OTHER';

    public static function getValues()
    {
        return [
            self::GROUP,
            self::TEAM,
//            self::OTHER,
        ];
    }
}
