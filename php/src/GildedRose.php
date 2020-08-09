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
                    $item->updateQuality();
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $item->updateQuality();
                    break;
                default:
                    $item->updateQuality();
                    break;
            }
        }
    }
}
