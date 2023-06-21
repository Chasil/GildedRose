<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    public function validItems(): array
    {
        return [
            [new Item('Foo', 1, 0)],
            [new Item('Foo', 0, 1)],
            [new Item('Aged Brie', 1, 0)],
            [new Item('Aged Brie', 0, 2)],
            [new Item('Aged Brie', 0, 1)],
        ];
    }

    /**
     * @dataProvider validItems
     */
    public function testIsQualityNeverNegative(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertGreaterThanOrEqual(0, $item->quality);
    }

    public function validAgedItems(): array
    {
        return [
            [new Item('Aged Brie', 2, 2), 3],
        ];
    }

    /**
     * @dataProvider validAgedItems
     * @param Item $item
     * @return void
     */
    public function testIfAgedItemIncreaseQualityInTime(Item $item, int $expectedValue): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertSame(3, $expectedValue);
    }

    public function validItemsMaxQuality(): array
    {
        return [
            [new Item('Foo', 25, 50)],
            [new Item('Aged Brie', 25, 50)],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 25, 50)],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 8, 49)],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 3, 49)],
        ];
    }

    /**
     * @dataProvider validItemsMaxQuality
     * @param Item $item
     * @return void
     */
    public function testItemMaximiumQuality(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertLessThanOrEqual(50, $item->quality);
    }

    public function validLegendaryItems(): array
    {
        return [
            [new Item('Sulfuras, Hand of Ragnaros', 1, 80)]
        ];
    }

    /**
     * @dataProvider validLegendaryItems
     * @param Item $item
     * @return void
     */
    public function testQualityOfLegendaryItemsNotDecrease(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertSame(80, $item->quality);
    }

    /**
     * @dataProvider validLegendaryItems
     * @param Item $item
     * @return void
     */
    public function testNeverBeSold(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertSame(1, $item->sellIn);
    }

    public function validBackstageItem(): array
    {
        return [
            [new Item('Backstage passes to a TAFKAL80ETC concert', 20, 5), 6],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 11, 5), 7],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 8, 5), 7],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 6, 5), 8],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 1, 5), 8],
        ];
    }

    /**
     * @dataProvider validBackstageItem
     * @param Item $item
     * @param int $expectedQualityAfterUpdate
     * @return void
     */
    public function testIfQualityRiseRules(Item $item, int $expectedQualityAfterUpdate): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateItems();
        $this->assertSame($expectedQualityAfterUpdate, $item->quality);
    }

}
