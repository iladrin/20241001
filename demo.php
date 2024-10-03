<?php

class Registry
{
    private array $items = [];

    public function register(mixed $item): void
    {
        if (in_array($item, $this->items, true)) {
            return;
        }

        $this->items[] = $item;
    }

    public function getItems(): array
    {
        return $this->items;
    }
}

class Logger
{

    public function __construct(
        private Registry $registry
    )
    {
        $this->registry->register($this);
    }

    public function log(string $level, string $message): void
    {
        $message = date('c') . " : $level - $message" . PHP_EOL;
        file_put_contents(__DIR__ . '/logs/log.txt', $message, FILE_APPEND);
    }
}

$registry = new Registry();

$logger = new Logger($registry);
$logger->log('info', 'Hello world');

$logger = new Logger($registry);
$logger->log('info', 'Hello world');

var_dump($registry->getItems());
