<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit\Tests\unit\no_cov;

use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\App;
use vansari\workshop\phpunit\Handler\ExampleHandlerInterface;

class AppNoCoverageTest extends TestCase
{
    /*
     * This Test will only report the executed lines of code in the affected class
     * because the other classes were mocked.
     */
    public function testRun(): void
    {
        $handlerMock = Mockery::mock(ExampleHandlerInterface::class);
        $handlerMock->shouldReceive('handle')->once();
        $loggerMock = Mockery::mock(LoggerInterface::class);
        $loggerMock->shouldReceive('info')->once()->with('App Log');
        $loggerMock->shouldReceive('info')->once()->withAnyArgs();
        $app = new App($handlerMock, $loggerMock);
        $this->assertIsInt($app->run());
    }

    /*
     * This Test will only report the executed lines of code in the affected class
     * because the other classes were mocked.
     */
    public function testRunWithNoAssert(): void
    {
        $handlerMock = Mockery::mock(ExampleHandlerInterface::class);
        $handlerMock->shouldReceive('handle')->once();
        $loggerMock = Mockery::mock(LoggerInterface::class);
        $loggerMock->shouldReceive('info')->once()->with('App Log');
        $loggerMock->shouldReceive('info')->once()->withAnyArgs();
        $app = new App($handlerMock, $loggerMock);
        $app->run();
    }
}
