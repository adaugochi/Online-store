<?php

namespace App\helpers;

class Statuses
{
    const ACTIVE = 'active';
    const IN_ACTIVE = 'inactive';
    const CONFIRMED = 'confirmed';
    const SUCCESS = 'success';
    const FAILED = 'failed';
    const AWAITING_SHIPMENT = 'awaiting-shipment';

    const STATUS = [
        0 => self::IN_ACTIVE,
        1 => self::ACTIVE,
        self::AWAITING_SHIPMENT => 'Awaiting Shipment'
    ];
}
