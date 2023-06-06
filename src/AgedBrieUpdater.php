<?php

namespace GildedRose;

class AgedBrieUpdater extends GildedRoseItemUpdater
{
    public function update(): void
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    private function updateQuality(): void
    {
        if ($this->isQualityValueValid($this->item->quality)) {
            $this->item->quality += 1;
        }
    }

    private function updateSellIn(): void
    {
        $this->item->sellIn -= 1;
    }

    protected function isQualityValueValid(int $quality): bool
    {
        return $quality < self::MAX_QUALITY;
    }
}