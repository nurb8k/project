<?php

namespace App\Enums\Event;

enum Type: string
{
    case Conference = 'Conference';
    case Convention = 'Convention';
    case Festival = 'Festival';
    case Performance = 'Performance';
    case Party = 'Party';
    case Rally = 'Rally';
    case Screening = 'Screening';
    case Seminar = 'Seminar';
    case Tour = 'Tour';
    case Other = 'Other';

}