<?php

declare(strict_types=1);

namespace GildedRose\Item;

final class SulfurasItem extends Item
{
    protected function updateQuality(): void
    {
        $this->setQuality($this->getQuality());
    }

    protected function updateSellIn(): void
    {
        $this->setSellIn($this->getSellIn());
    }
}
