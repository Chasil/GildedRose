<?php

namespace GildedRose;

class LegendaryItem extends GildedRoseItem
{
    public function createUpdater(): GildedRoseItemUpdater
    {
        return new LegendaryItemUpdater($this->item);
    }
}