<?php

declare(strict_types=1);

namespace GildedRose\Item;

class NormalItem extends Item
{
    protected function updateQuality(): void
    {
        $this->decreaseQuality();
        if ($this->getSellIn() < 0) {
            $this->decreaseQuality();
        }
    }
}
