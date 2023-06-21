<?php

namespace GildedRose;

class AgedBrieUpdater extends GildedRoseItemUpdater
{
    protected const QUALITY_CHANGE = 1;

    protected function updateQuality(): void
    {
        $this->item->quality += static::QUALITY_CHANGE;
    }
}