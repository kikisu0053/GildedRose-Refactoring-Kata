<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\AgedBrieItem;
use GildedRose\BackstagePassesItem;
use GildedRose\GildedRose;
use GildedRose\NormalItem;
use GildedRose\SulfurasItem;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function testFoo(): void
    {
        // Arrange
        $items = [new NormalItem('foo', 0, 0)];

        // Act
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame('foo', $items[0]->name);
    }

    /**
     * @dataProvider providerNormalUpdateQuality
     */
    public function testNormalUpdateQuality($data, $expected): void
    {
        // Arrange
        $items = [new NormalItem('foo', $data['sellIn'], $data['quality'])];

        // Act
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame($expected['sellIn'], $items[0]->sell_in);
        $this->assertSame($expected['quality'], $items[0]->quality);
    }

    /**
     * @dataProvider providerAgedBrieUpdateQuality
     */
    public function testAgedBrieUpdateQuality($data, $expected): void
    {
        // Arrange
        $items = [new AgedBrieItem('Aged Brie', $data['sellIn'], $data['quality'])];

        // Act
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame($expected['sellIn'], $items[0]->sell_in);
        $this->assertSame($expected['quality'], $items[0]->quality);
    }

    /**
     * @dataProvider providerSulfurasUpdateQuality
     */
    public function testSulfurasUpdateQuality($data): void
    {
        // Arrange
        $items = [new SulfurasItem('Sulfuras, Hand of Ragnaros', $data['sellIn'], $data['quality'])];

        // Act
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame($data['sellIn'], $items[0]->sell_in);
        $this->assertSame($data['quality'], $items[0]->quality);
    }

    /**
     * @dataProvider providerBackstagePassesUpdateQuality
     */
    public function testBackstagePassesUpdateQuality($data, $expected): void
    {
        // Arrange
        $items = [
            new BackstagePassesItem('Backstage passes to a TAFKAL80ETC concert', $data['sellIn'], $data['quality']),
        ];

        // Act
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();

        // Assert
        $this->assertSame($expected['sellIn'], $items[0]->sell_in);
        $this->assertSame($expected['quality'], $items[0]->quality);
    }

    public function providerNormalUpdateQuality()
    {
        return [
            [
                # 0 quality decrease two when sellIn less than zero
                [
                    'sellIn' => -1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -2,
                    'quality' => 8,
                ],
            ],
            [
                # 1 quality decrease two when sellIn less than zero
                [
                    'sellIn' => 0,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -1,
                    'quality' => 8,
                ],
            ],
            [
                # 2 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 9,
                ],
            ],
            [
                # 3 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 4,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 3,
                    'quality' => 9,
                ],
            ],
            [
                # 4 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 5,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 4,
                    'quality' => 9,
                ],
            ],
            [
                # 5 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 6,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 5,
                    'quality' => 9,
                ],
            ],
            [
                # 6 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 9,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 8,
                    'quality' => 9,
                ],
            ],
            [
                # 7 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 10,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 9,
                    'quality' => 9,
                ],
            ],
            [
                # 8 quality decrease one when sellIn not less than zero
                [
                    'sellIn' => 11,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 10,
                    'quality' => 9,
                ],
            ],
            [
                # 9 quality must more than zero
                [
                    'sellIn' => 1,
                    'quality' => 0,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 0,
                ],
            ],
        ];
    }

    public function providerAgedBrieUpdateQuality()
    {
        return [
            [
                # 0 quality increase two when sellIn less than zero
                [
                    'sellIn' => -1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -2,
                    'quality' => 12,
                ],
            ],
            [
                # 1 quality increase two when sellIn less than zero
                [
                    'sellIn' => 0,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -1,
                    'quality' => 12,
                ],
            ],
            [
                # 2 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 11,
                ],
            ],
            [
                # 3 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 4,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 3,
                    'quality' => 11,
                ],
            ],
            [
                # 4 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 5,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 4,
                    'quality' => 11,
                ],
            ],
            [
                # 5 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 6,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 5,
                    'quality' => 11,
                ],
            ],
            [
                # 6 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 9,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 8,
                    'quality' => 11,
                ],
            ],
            [
                # 7 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 10,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 9,
                    'quality' => 11,
                ],
            ],
            [
                # 8 quality increase one when sellIn not less than zero
                [
                    'sellIn' => 11,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 10,
                    'quality' => 11,
                ],
            ],
            [
                # 9 quality must not more than 50
                [
                    'sellIn' => 1,
                    'quality' => 50,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 50,
                ],
            ],
        ];
    }

    public function providerSulfurasUpdateQuality()
    {
        return [
            [
                # 0 quality and sellIn never change
                [
                    'sellIn' => -1,
                    'quality' => 10,
                ],
            ],
            [
                # 1 quality and sellIn never change
                [
                    'sellIn' => 0,
                    'quality' => 10,
                ],
            ],
            [
                # 2 quality and sellIn never change
                [
                    'sellIn' => 1,
                    'quality' => 10,
                ],
            ],
            [
                # 3 quality and sellIn never change
                [
                    'sellIn' => 4,
                    'quality' => 10,
                ],
            ],
            [
                # 4 quality and sellIn never change
                [
                    'sellIn' => 5,
                    'quality' => 10,
                ],
            ],
            [
                # 5 quality and sellIn never change
                [
                    'sellIn' => 6,
                    'quality' => 10,
                ],
            ],
            [
                # 6 quality and sellIn never change
                [
                    'sellIn' => 9,
                    'quality' => 10,
                ],
            ],
            [
                # 7 quality and sellIn never change
                [
                    'sellIn' => 10,
                    'quality' => 10,
                ],
            ],
            [
                # 8 quality and sellIn never change
                [
                    'sellIn' => 11,
                    'quality' => 10,
                ],
            ],
        ];
    }

    public function providerBackstagePassesUpdateQuality()
    {
        return [
            [
                # 0 quality equal to zero when sellIn less than zero
                [
                    'sellIn' => -1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -2,
                    'quality' => 0,
                ],
            ],
            [
                # 1 quality equal to zero when sellIn is zero
                [
                    'sellIn' => 0,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -1,
                    'quality' => 0,
                ],
            ],
            [
                # 2 quality increase three when sellIn in (1,2,3,4,5)
                [
                    'sellIn' => 1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 13,
                ],
            ],
            [
                # 3 quality increase three when sellIn in (1,2,3,4,5)
                [
                    'sellIn' => 4,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 3,
                    'quality' => 13,
                ],
            ],
            [
                # 4 quality increase three when sellIn in (1,2,3,4,5)
                [
                    'sellIn' => 5,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 4,
                    'quality' => 13,
                ],
            ],
            [
                # 5 quality increase two when sellIn in (6,7,8,9,10)
                [
                    'sellIn' => 6,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 5,
                    'quality' => 12,
                ],
            ],
            [
                # 6 quality increase two when sellIn in (6,7,8,9,10)
                [
                    'sellIn' => 9,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 8,
                    'quality' => 12,
                ],
            ],
            [
                # 7 quality increase two when sellIn in (6,7,8,9,10)
                [
                    'sellIn' => 10,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 9,
                    'quality' => 12,
                ],
            ],
            [
                # 8 quality increase one when sellIn more than 10
                [
                    'sellIn' => 11,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 10,
                    'quality' => 11,
                ],
            ],
        ];
    }

    public function providerConjuredUpdateQuality()
    {
        return [
            [
                # 0 quality decrease 4 (twice normal) when sellIn less than zero
                [
                    'sellIn' => -1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -2,
                    'quality' => 6,
                ],
            ],
            [
                # 1 quality decrease 4 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 0,
                    'quality' => 10,
                ],
                [
                    'sellIn' => -1,
                    'quality' => 6,
                ],
            ],
            [
                # 2 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 1,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 8,
                ],
            ],
            [
                # 3 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 4,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 3,
                    'quality' => 8,
                ],
            ],
            [
                # 4 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 5,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 4,
                    'quality' => 8,
                ],
            ],
            [
                # 5 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 6,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 5,
                    'quality' => 8,
                ],
            ],
            [
                # 6 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 9,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 8,
                    'quality' => 8,
                ],
            ],
            [
                # 7 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 10,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 9,
                    'quality' => 8,
                ],
            ],
            [
                # 8 quality decrease 2 (twice normal) when sellIn less than zero
                [
                    'sellIn' => 11,
                    'quality' => 10,
                ],
                [
                    'sellIn' => 10,
                    'quality' => 8,
                ],
            ],
            [
                # 9 quality must more than zero
                [
                    'sellIn' => 1,
                    'quality' => 0,
                ],
                [
                    'sellIn' => 0,
                    'quality' => 0,
                ],
            ],
        ];
    }
}
