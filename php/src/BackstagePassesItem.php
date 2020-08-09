<?php

declare(strict_types=1);

namespace GildedRose;

final class BackstagePassesItem extends Item
{
    public function updateQuality(): void
    {
        $this->updateQualityBackstage();
        $this->decreaseSellIn();
        if ($this->getSellIn() < 0) {
            $this->setQualityZero();
        }
    }

    private function updateQualityBackstage(): void
    {
        $this->increaseQuality();
        if ($this->getSellIn() < 11) {
            $this->increaseQuality();
        }
        if ($this->getSellIn() < 6) {
            $this->increaseQuality();
        }
    }
}
