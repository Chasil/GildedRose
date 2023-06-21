<?php

namespace GildedRose;

class AgedBrie extends GildedRoseItem
{
    public function createUpdater(): GildedRoseItemUpdater
    {
        return new AgedBrieUpdater($this->item);
    }
}