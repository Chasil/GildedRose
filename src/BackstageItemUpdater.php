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
        if ($this->item->quality < 50) {
            $this->item->quality += 1;

            if ($this->item->sellIn < 11) {
                if ($this->item->quality < 50) {
                    $this->item->quality += 1;
                }
            }
            if ($this->item->sellIn < 6) {
                if ($this->item->quality < 50) {
                    $this->item->quality += 1;
                }
            }
        }
    }

    private function updateSellIn(): void
    {
        if ($this->item->sellIn < 0) {
            $this->item->quality = $this->item->quality - $this->item->quality;
        } else {
            $this->item->sellIn -= 1;
        }
    }
}