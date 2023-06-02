<?php

namespace GildedRose;

class GildedRoseItemFactory
{
    public static function createFromType(Item $item): GildedRoseItem
    {
        switch($item->name) {
            case 'Aged Brie':
                return new AgedBrie($item);
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstageItem($item);
                break;
            case 'Sulfuras, Hand of Ragnaros':
                return new LegendaryItem($item);
                break;
            case 'Conjured':
                return new ConjuredItem($item);
                break;
        }

        throw new \InvalidArgumentException();
    }
}