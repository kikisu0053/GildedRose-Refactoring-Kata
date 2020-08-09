<?php

declare(strict_types=1);

namespace GildedRose;

final class NormalItem extends Item
{
    public function updateQuality(): void
    {
        $this->decreaseQuality();
        if ($this->getSellIn() < 0) {
            $this->decreaseQuality();
        }
    }
}
