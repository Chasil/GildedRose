<?php

namespace GildedRose;

abstract class GildedRoseItemUpdater
{
    abstract public function GetGildedRoseItem(): Item;

    public function update(string $name, int $quality, int $sellIn): void
    {
        $gildedItem = $this->GetGildedRoseItem();
        $gildedItem->update($name, $quality, $sellIn);
    }
}