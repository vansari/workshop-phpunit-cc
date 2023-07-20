<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit;

use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\Handler\ExampleHandlerInterface;

class App
{
    public function __construct(
        private readonly ExampleHandlerInterface $handler,
        private readonly LoggerInterface $logger
    ) {
    }

    public function run(): int
    {
        $this->handler->handle();
        $this->logger->info('App Log');
        $result = $this->calculate();
        $this->logger->info('We have calculated: { result }', ['result' => $result]);

        return $result;
    }

    private function calculate(): int
    {
        return random_int(100, 999) * random_int(10, 99);
    }
}
