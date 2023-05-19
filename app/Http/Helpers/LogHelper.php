<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Log;

class LogHelper extends UniqIdHelper
{
    private static $logging;

    public function __construct()
    {
        //
    }

    public function log(string $message)
    {
        self::$logging = Log::channel('daily');
        self::$logging->info($message, ['uniqid' => $this->getId()]);
    }
}