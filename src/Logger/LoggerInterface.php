<?php

namespace App\Logger;

interface LoggerInterface
{
    public function log(string $level, string $message);
}
