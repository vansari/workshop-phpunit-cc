<?php

declare(strict_types=1);

namespace vansari\workshop\phpunit\Tests\unit\unmocked_no_cov;

use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use vansari\workshop\phpunit\App;
use vansari\workshop\phpunit\Handler\ExampleHandler;

class AppNoMockNoCoverageTest extends TestCase
{
    /*
     * This example shows you that the coverage report reports all lines of code as covered which are executed.
     */
    public function testRun(): void
    {
        $logger = new Logger('myLog');
        $app = new App(new ExampleHandler($logger), $logger);
        $this->assertIsInt($app->run());
    }
}
