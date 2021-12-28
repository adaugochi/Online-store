<?php

namespace App\helpers;

class Statuses
{
    const ACTIVE = 'active';
    const IN_ACTIVE = 'inactive';
    const CONFIRMED = 'confirmed';
    const SUCCESS = 'success';
    const FAILED = 'failed';

    const STATUS = [
        0 => self::IN_ACTIVE,
        1 => self::ACTIVE
    ];
}
