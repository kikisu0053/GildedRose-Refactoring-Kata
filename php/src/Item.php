<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Item
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $sell_in;

    /**
     * @var int
     */
    protected $quality;

    public function __construct(string $name, int $sell_in, int $quality)
    {
        $this->name = $name;
        $this->sell_in = $sell_in;
        $this->quality = $quality;
    }

    public function __toString(): string
    {
        return "{$this->name}, {$this->sell_in}, {$this->quality}";
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSellIn(): int
    {
        return $this->sell_in;
    }

    public function getQuality(): int
    {
        return $this->quality;
    }

    public function upgrad(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
    }

    protected function setSellIn($sellIn): void
    {
        $this->sell_in = $sellIn;
    }

    protected function setQuality($quality): void
    {
        $this->quality = $quality;
    }

    protected function decreaseQuality(): void
    {
        if ($this->getQuality() > 0) {
            $this->setQuality($this->getQuality() - 1);
        }
    }

    protected function increaseQuality(): void
    {
        if ($this->getQuality() < 50) {
            $this->setQuality($this->getQuality() + 1);
        }
    }

    protected function updateSellIn(): void
    {
        $this->setSellIn($this->getSellIn() - 1);
    }

    abstract protected function updateQuality();
}
