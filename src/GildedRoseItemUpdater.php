<?php

namespace GildedRose;

abstract class GildedRoseItemUpdater
{
    protected string $name;
    protected int $quality, $sellIn;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    abstract public function getUpdateableItem(): Updateable;

    public static function createFromType(Item $item): GildedRoseItemUpdater
    {
//       match

        switch($item->name) {
            case 'Aged Brie':
                return new AgedBrie();
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstageItem();
                break;
            case 'Sulfuras, Hand of Ragnaros':
                return new LegendaryItem();
                break;
            case 'Conjured':
                return new ConjuredItem();
                break;
        }

        throw new \InvalidArgumentException();
    }

    final public function update(): void
    {
        $gildedItem = $this->getUpdateableItem();
        $gildedItem->update();
    }
}