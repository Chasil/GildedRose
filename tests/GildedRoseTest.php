<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class GildedRoseTest extends TestCase
{
    private function validItems(): array
    {
        return [
            [new Item('foo', 1, 0)],
            [new Item('foo', 0, 2)],
            [new Item('foo', 0, 1)],
        ];
    }

    /**
     * @dataProvider validItems
     */
    public function testIsQualityNeverNegative(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertGreaterThanOrEqual(0, $item->quality);
    }

    private function validAgedItems(): array
    {
        return [
            [new Item('Aged Brie', 2, 2)],
        ];
    }

    /**
     * @dataProvider validAgedItems
     * @param Item $item
     * @return void
     */
    public function testIfAgedItemIncreaseQualityInTime(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(3, $item->quality);
    }

    private function validItemsMaxQuality(): array
    {
        return [
            [new Item('Aged Brie', 25, 50)],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 25, 50)]
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
        $gildedRose->updateQuality();
        $this->assertLessThanOrEqual(50, $item->quality);
    }

    private function validLegendaryItems(): array
    {
        return [
            [new Item('Sulfuras, Hand of Ragnaros', 1, 5)]
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
        $gildedRose->updateQuality();
        $this->assertSame(5, $item->quality);
    }

    /**
     * @dataProvider validLegendaryItems
     * @param Item $item
     * @return void
     */
    public function testNeverBeSold(Item $item): void
    {
        $gildedRose = new GildedRose([$item]);
        $gildedRose->updateQuality();
        $this->assertSame(1, $item->sellIn);
    }

    private function validBackstageItem(): array
    {
        return [
            [new Item('Backstage passes to a TAFKAL80ETC concert', 10, 5), 7],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 6, 5), 7],
            [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 5), 8],
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
        $gildedRose->updateQuality();
        $this->assertSame($expectedQualityAfterUpdate, $item->quality);
    }

}
