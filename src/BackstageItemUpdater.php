<?php

namespace GildedRose;

class BackstageItemUpdater extends GildedRoseItemUpdater
{
    public function update(): void
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    private function updateQuality(): void
    {
        if (!$this->isQualityValueValid($this->item->quality) || !($this->item->sellIn < 11)) {
            $this->item->quality += 0;
        } else {
            $this->item->quality = $this->increaseQualityBy($this->item->quality, 1);

            $this->item->quality = ($this->item->sellIn < 6)
                ? $this->increaseQualityBy($this->item->quality, 2)
                : $this->increaseQualityBy($this->item->quality, 1);
        }

        if ($this->item->sellIn < 0) {
            $this->item->quality = $this->item->quality - $this->item->quality;
        }
    }

    private function updateSellIn(): void
    {
        if ($this->item->sellIn > 0) {
            $this->item->sellIn -= 1;
        }
    }

    protected function isQualityValueValid(int $quality): bool
    {
        return $quality >= self::MIN_QUALITY && $quality <= self::MAX_QUALITY;
    }
}