<?php

namespace GildedRose;

abstract class ItemUpdater
{
    protected string $name;
    protected int $quality, $sellIn;

    abstract public function getUpdateableItem(): Updateable;

    public function update(string $name, int $quality, int $sellIn): void
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;

        $gildedItem = $this->getUpdateableItem();
        $gildedItem->update();
    }
}