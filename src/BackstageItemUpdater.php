<?php

namespace GildedRose;

class BackstageItemUpdater extends GildedRoseItemUpdater
{
    protected const QUALITY_CHANGE = 1;
    protected const DOUBLE_QUALITY_CHANGE_WHEN_SELL_IN = 10;
    protected const TRIPLE_QUALITY_CHANGE_WHEN_SELL_IN = 5;

    protected function updateQuality(): void
    {
        $this->item->quality += static::QUALITY_CHANGE;

        if ($this->item->sellIn <= static::DOUBLE_QUALITY_CHANGE_WHEN_SELL_IN) {
            $this->item->quality += static::QUALITY_CHANGE;
        }

        if ($this->item->sellIn <= self::TRIPLE_QUALITY_CHANGE_WHEN_SELL_IN) {
            $this->item->quality += static::QUALITY_CHANGE;
        }
    }
}