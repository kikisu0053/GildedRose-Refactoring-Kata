<?php

declare(strict_types=1);

namespace GildedRose;

final class AgedBrieItem extends Item
{
    public function updateQuality(): void
    {
        $this->increaseQuality();
        $this->decreaseSellIn();
        if ($this->getSellIn() < 0) {
            $this->increaseQuality();
        }
    }
}
