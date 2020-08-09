<?php

declare(strict_types=1);

namespace GildedRose\Item;

final class ConjuredItem extends NormalItem
{
    protected function updateQuality(): void
    {
        parent::updateQuality();
        parent::updateQuality();
    }
}
