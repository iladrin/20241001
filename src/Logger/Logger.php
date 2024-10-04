<?php

namespace App\Logger;

class Logger implements LoggerInterface
{
    public function __construct(private readonly string $fileName)
    {
    }

    public function log(string $level, string $message): void
    {
        $logMessage = sprintf('[%s] %s: %s', date('Y-m-d H:i:s'), $level, $message) . PHP_EOL;
        file_put_contents($this->fileName, $logMessage, FILE_APPEND);
    }
}