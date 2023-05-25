<?php

namespace GildedRose;

class ConjuredItem extends GildedRoseItem
{
    public function createUpdater(): GildedRoseItemUpdater
    {
        return new ConjuredItemUpdater($this->item);
    }
}