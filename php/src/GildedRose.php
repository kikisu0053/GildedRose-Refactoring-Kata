<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            if ($item->name === 'Sulfuras, Hand of Ragnaros') {
                continue;
            }

            if ($item->name === 'Aged Brie') {
                $item = $this->increaseQuality($item);
                $item = $this->decreaseSellIn($item);
                if ($item->sell_in < 0) {
                    $item = $this->increaseQuality($item);
                }
                continue;
            }

            if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                $item = $this->updateQualityBackstage($item);
                $item = $this->decreaseSellIn($item);
                if ($item->sell_in < 0) {
                    $item = $this->setQualityZero($item);
                }
                continue;
            }

            $item = $this->decreaseQuality($item);
            $item = $this->decreaseSellIn($item);
            if ($item->sell_in < 0) {
                $item = $this->decreaseQuality($item);
            }
        }
    }

    private function decreaseQuality($item)
    {
        if ($item->quality > 0) {
            --$item->quality;
        }

        return $item;
    }

    private function increaseQuality($item)
    {
        if ($item->quality < 50) {
            ++$item->quality;
        }
        return $item;
    }

    private function setQualityZero($item)
    {
        $item->quality = 0;
        return $item;
    }

    private function decreaseSellIn($item)
    {
        --$item->sell_in;
        return $item;
    }

    private function updateQualityBackstage($item)
    {
        $item = $this->increaseQuality($item);
        if ($item->sell_in < 11) {
            $item = $this->increaseQuality($item);
        }
        if ($item->sell_in < 6) {
            $item = $this->increaseQuality($item);
        }

        return $item;
    }
}
