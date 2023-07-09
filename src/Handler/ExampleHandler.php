<?php
declare(strict_types=1);

namespace vansari\workshop\phpunit\Handler;

use Psr\Log\LoggerInterface;
use vansari\workshop\phpunit\Dto\ExampleDto;

class ExampleHandler implements ExampleHandlerInterface
{

    private ?ExampleDto $exdto = null;

    public function __construct(
        private readonly LoggerInterface $logger
    ) {
    }

    public function handle(?ExampleDto $dto = null): void
    {
        $this->exdto = $dto ?? new ExampleDto();
        $this->exdto
            ->setId(1)
            ->setName('Example');

        $this->logger->info('Handle me');

        $this->exdto
            ->setResult(1)
            ->add(2)
            ->multiply(5)
            ->sub(10)
            ->devide(3);
    }

    public function getAmount(): ?float
    {
        return $this->exdto->getResult();
    }
}
