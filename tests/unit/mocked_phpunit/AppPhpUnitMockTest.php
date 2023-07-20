<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit\Tests\unit\mocked_phpunit;

use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\App;
use PHPUnit\Framework\TestCase;
use vansari\workshop\phpunit\Handler\ExampleHandlerInterface;

/**
 * @coversDefaultClass \vansari\workshop\phpunit\App
 */
class AppPhpUnitMockTest extends TestCase
{

    /**
     * @covers ::run
     */
    public function testRun(): void
    {
        $mockedHandler = $this->createMock(ExampleHandlerInterface::class);
        $mockedHandler->expects(self::once())->method('handle');
        $mockedLogger = $this->createMock(LoggerInterface::class);
        $mockedLogger->expects(self::any())->method('info');
        $app = new App($mockedHandler, $mockedLogger);
        $this->assertIsInt($app->run());
    }
}
