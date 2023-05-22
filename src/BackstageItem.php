<?php

namespace GildedRose;

class BackstageItem extends GildedRoseItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new BackstageItemUpdater($this->name, $this->quality, $this->sellIn);
    }
}