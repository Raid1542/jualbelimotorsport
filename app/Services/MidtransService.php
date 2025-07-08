<?php

namespace App\Services;

use Midtrans\Config;

class MidtransService
{
    public static function init()
    {
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }
}
