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
            if ($item->name === 'Aged Brie') {
                if ($item->quality < 50) {
                    $item = $this->increaseQuality($item);
                }
            } elseif ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality < 50) {
                    $item = $this->increaseQuality($item);
                    if ($item->sell_in < 11) {
                        if ($item->quality < 50) {
                            $item = $this->increaseQuality($item);
                        }
                    }
                    if ($item->sell_in < 6) {
                        if ($item->quality < 50) {
                            $item = $this->increaseQuality($item);
                        }
                    }
                }
            } else {
                if ($item->quality > 0) {
                    if ($item->name !== 'Sulfuras, Hand of Ragnaros') {
                        $item = $this->decreaseQuality($item);
                    }
                }
            }

            if ($item->name === 'Sulfuras, Hand of Ragnaros') {
                //do nothing
            } else {
                $item = $this->decreaseSellIn($item);
            }

            if ($item->sell_in < 0) {
                if ($item->name === 'Aged Brie') {
                    if ($item->quality < 50) {
                        $item = $this->increaseQuality($item);
                    }
                } else {
                    if ($item->name === 'Backstage passes to a TAFKAL80ETC concert') {
                        $item = $this->setQualityZero($item);
                    } else {
                        if ($item->quality > 0) {
                            if ($item->name === 'Sulfuras, Hand of Ragnaros') {
                                // do nothing
                            } else {
                                $item = $this->decreaseQuality($item);
                            }
                        }
                    }
                }
            }
        }
    }

    private function decreaseQuality($item)
    {
        --$item->quality;
        return $item;
    }

    private function increaseQuality($item)
    {
        ++$item->quality;
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
}
