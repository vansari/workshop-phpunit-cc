<?php
declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';

use DI\ContainerBuilder;
use vansari\workshop\phpunit\App;

$builder = new ContainerBuilder();
$container = $builder
    ->useAutowiring(true)
    ->useAttributes(true)
    ->addDefinitions(dirname(__DIR__) . '/bootstrap.php')
    ->build();

/** @var App $app */
$app = $container->get('app');
$app->run();
