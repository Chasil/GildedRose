<?php

namespace GildedRose;

class GildedRoseItemUpdater
{
    protected const MIN_QUALITY = 0;
    protected const MAX_QUALITY = 50;
    protected const SELL_IN_CHANGE = -1;
    protected const QUALITY_CHANGE = -1;

    public function __construct(protected Item $item)
    {
    }

    final public function update(): void
    {
        $this->updateSellIn();
        $this->updateQuality();
        $this->fitQualityBetweenMinAndMax();
    }

    protected function updateSellIn(): void
    {
        if ($this->item->sellIn > 0) {
            $this->item->sellIn += static::SELL_IN_CHANGE;
        }
    }

    protected function updateQuality(): void
    {
        $this->item->quality += static::QUALITY_CHANGE;
        if ($this->item->sellIn <= 0) {
            $this->item->quality += static::QUALITY_CHANGE;
        }
    }

    protected function fitQualityBetweenMinAndMax(): void
    {
        $this->item->quality = min(static::MAX_QUALITY, max(static::MIN_QUALITY, $this->item->quality));
    }
}