<?php

namespace GildedRose;

class BackstageItemUpdater implements Updateable
{
    private const UPDATER_NAMES = 'Backstage passes to a TAFKAL80ETC concert';

    public function update(): void
    {
        if ($this->name === self::UPDATER_NAMES) {
            $this->updateQuality();
            $this->updateSellIn();
        }
    }

    private function updateQuality(): void
    {
        if ($this->quality < 50) {
            $this->quality += 1;

            if ($this->sellIn < 11) {
                if ($this->quality < 50) {
                    $this->quality += 1;
                }
            }
            if ($this->sellIn < 6) {
                if ($this->quality < 50) {
                    $this->quality += 1;
                }
            }
        }
    }

    private function updateSellIn(): void
    {
        if ($this->sellIn < 0) {
            $this->quality = $this->quality - $this->quality;
        } else {
            $this->sellIn -= 1;
        }
    }
}