<?php

declare(strict_types=1);

namespace GildedRose;

abstract class Item
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $sell_in;

    /**
     * @var int
     */
    public $quality;

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

    public function decreaseQuality(): void
    {
        if ($this->quality > 0) {
            --$this->quality;
        }
    }

    public function increaseQuality(): void
    {
        if ($this->quality < 50) {
            ++$this->quality;
        }
    }

    public function setQualityZero(): void
    {
        $this->quality = 0;
    }

    public function decreaseSellIn(): void
    {
        --$this->sell_in;
    }

    public function getSellIn()
    {
        return $this->sell_in;
    }

    abstract public function updateQuality();
}
