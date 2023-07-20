<?php

declare(strict_types=1);

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\App;
use vansari\workshop\phpunit\Handler\ExampleHandler;
use vansari\workshop\phpunit\Handler\ExampleHandlerInterface;

return [
    LoggerInterface::class => DI\factory(function () {
        $logger = new Logger('app');

        $fileHandler = new StreamHandler('var/logfile.log', Level::Debug);
        $fileHandler->setFormatter(new LineFormatter());
        $logger->pushHandler($fileHandler);

        return $logger;
    }),
    ExampleHandlerInterface::class => fn(LoggerInterface $logger) => new ExampleHandler($logger),
    'app' => fn (ExampleHandlerInterface $handler, LoggerInterface $logger) => new App($handler, $logger),
];
