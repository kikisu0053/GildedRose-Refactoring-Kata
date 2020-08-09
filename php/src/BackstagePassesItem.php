<?php

declare(strict_types=1);

namespace GildedRose;

final class BackstagePassesItem extends Item
{
    public function updateQuality(): void
    {
        $this->increaseQuality();
        if ($this->getSellIn() < 10) {
            $this->increaseQuality();
        }
        if ($this->getSellIn() < 5) {
            $this->increaseQuality();
        }
        if ($this->getSellIn() < 0) {
            $this->setQualityZero();
        }
    }
}
