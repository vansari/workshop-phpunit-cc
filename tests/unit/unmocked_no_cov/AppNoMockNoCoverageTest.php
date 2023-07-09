<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit\Tests\unit\unmocked_no_cov;

use Mockery;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\App;
use vansari\workshop\phpunit\Handler\ExampleHandler;
use vansari\workshop\phpunit\Handler\ExampleHandlerInterface;

class AppNoMockNoCoverageTest extends TestCase
{
    /*
     * This example shows you that the coverage report reports as covered all lines of code that are executed.
     */
    public function testRun(): void
    {
        $logger = new Logger('myLog');
        $app = new App(new ExampleHandler($logger), $logger);
        $this->assertIsInt($app->run());
    }
}
