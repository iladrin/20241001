<?php

namespace App\Controller;

use App\Logger\LoggerInterface;

class HomepageController extends AbstractController
{
    public function __invoke(): void
    {
        $this->logger->log('debug', 'called class: ' . __METHOD__);
    }
}
