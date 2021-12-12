<?php

namespace App\helpers;

class Statuses
{
    const ACTIVE = 'active';
    const IN_ACTIVE = 'inactive';

    const STATUS = [
        0 => self::IN_ACTIVE,
        1 => self::ACTIVE
    ];
}
