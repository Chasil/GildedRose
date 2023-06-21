<?php

namespace GildedRose;

class BackstageItem extends GildedRoseItem
{
    public function createUpdater(): GildedRoseItemUpdater
    {
        return new BackstageItemUpdater($this->item);
    }
}