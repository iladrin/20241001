<?php

namespace App\Logger;

// Il existe déjà un LoggerInterface dans ce `namespace`,
// on peut soit l'écraser par le `use` suivant (sans alias),
// soit utiliser l'alias pour conserver les 2 symboles accessibles
use \Psr\Log\LoggerInterface as PsrLoggerInterface;

trait LoggerAwareTrait
{
    protected readonly PsrLoggerInterface $logger;

    public function setLogger(PsrLoggerInterface $logger): static
    {
        $this->logger = $logger;
        return $this;
    }
}