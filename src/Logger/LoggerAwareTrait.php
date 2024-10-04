<?php

namespace App\Logger;

trait LoggerAwareTrait
{
    protected readonly LoggerInterface $logger;

    public function setLogger(LoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }
}