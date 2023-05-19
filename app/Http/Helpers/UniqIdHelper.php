<?php

namespace App\Http\Helpers;

class UniqIdHelper
{
    private static $logid;

    public function setId()
    {
        self::$logid = uniqid();
        return $this->getId();
    }

    public function getId()
    {
        return self::$logid ?? $this->setId();
    }
}