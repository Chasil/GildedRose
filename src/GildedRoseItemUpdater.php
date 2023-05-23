<?php

namespace GildedRose;

abstract class GildedRoseItemUpdater
{
    protected Item $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    abstract public function getUpdateableItem(): Updateable;

    //item factory
    public static function createFromType(Item $item): GildedRoseItemUpdater
    {
//       match

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

    //item updater
    final public function update(): void
    {
        $gildedItem = $this->getUpdateableItem();
        $gildedItem->update();
    }
}