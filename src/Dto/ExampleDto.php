<?php

declare(strict_types=1);

namespace vansari\workshop\phpunit\Dto;

class ExampleDto
{
    private ?int $id = null;
    private ?string $name = null;
    private ?float $result = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return ExampleDto
     */
    public function setId(?int $id): ExampleDto
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return ExampleDto
     */
    public function setName(?string $name): ExampleDto
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return float|null
     */
    public function getResult(): ?float
    {
        return $this->result;
    }

    /**
     * @param float|null $result
     * @return ExampleDto
     */
    public function setResult(?float $result): ExampleDto
    {
        $this->result = $result;
        return $this;
    }

    public function add(int $amount): self
    {
        $this->result += $amount;
        return $this;
    }

    public function sub(int $float): self
    {
        $this->result -= $float;
        return $this;
    }

    public function multiply(int $multiplier): self
    {
        $this->result *= $multiplier;
        return $this;
    }

    public function devide(int $divisor): self
    {
        $this->result /= $divisor;
        return $this;
    }
}
