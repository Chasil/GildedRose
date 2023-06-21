<?php

namespace GildedRose;

class GildedRoseItemFactory
{
    public static function createFromType(Item $item): GildedRoseItem
    {
        switch($item->name) {
            case 'Aged Brie':
                return new AgedBrie($item);
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstageItem($item);
            case 'Sulfuras, Hand of Ragnaros':
                return new LegendaryItem($item);
            case 'Conjured':
                return new ConjuredItem($item);
            default:
                return new GildedRoseItem($item);
        }

        throw new \InvalidArgumentException();
    }
}