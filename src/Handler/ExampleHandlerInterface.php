<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit\Handler;

interface ExampleHandlerInterface
{
    public function handle(): void;
    public function getAmount(): ?float;
}
