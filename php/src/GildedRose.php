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
            switch ($item->name) {
                case 'Sulfuras, Hand of Ragnaros':
                    $item->updateQuality();
                    break;
                case 'Aged Brie':
                    $item->increaseQuality();
                    $item->decreaseSellIn();
                    if ($item->getSellIn() < 0) {
                        $item->increaseQuality();
                    }
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $item = $this->updateQualityBackstage($item);
                    $item->decreaseSellIn();
                    if ($item->getSellIn() < 0) {
                        $item->setQualityZero();
                    }
                    break;
                default:
                    $item->updateQuality();
                    break;
            }
        }
    }

    private function updateQualityBackstage($item)
    {
        $item->increaseQuality();
        if ($item->getSellIn() < 11) {
            $item->increaseQuality();
        }
        if ($item->getSellIn() < 6) {
            $item->increaseQuality();
        }

        return $item;
    }
}
