<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit\Tests\unit\cov;

use Mockery;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\App;
use vansari\workshop\phpunit\Handler\ExampleHandlerInterface;

/**
 * @coversDefaultClass \vansari\workshop\phpunit\App
 */
class AppTest extends TestCase
{

    /**
     * @covers ::run
     * @covers ::calculate
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
}
