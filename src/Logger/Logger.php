<?php

namespace App\Logger;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

class Logger extends AbstractLogger implements LoggerInterface
{
    public function __construct(private readonly string $fileName)
    {
    }

    public function log($level, string|\Stringable $message, array $context = []): void
    {
        $logMessage = sprintf('[%s] %s: %s', date('Y-m-d H:i:s'), $level, $message) . PHP_EOL;
        file_put_contents($this->fileName, $logMessage, FILE_APPEND);
    }
}