<?php

namespace GildedRose;

class LegendaryItem extends GildedRoseItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new LegendaryItemUpdater($this->name, $this->quality, $this->sellIn);
    }
}