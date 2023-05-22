<?php

namespace GildedRose;

class ConjuredItem extends GildedRoseItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new ConjuredItemUpdater($this->name, $this->quality, $this->sellIn);
    }
}