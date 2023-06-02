<?php

namespace GildedRose;

class BackstageItemUpdater extends GildedRoseItemUpdater
{
    public function update(): void
    {
        $gildedItemFunctions = new GildedItemFunctions();
        $this->item->quality = $gildedItemFunctions->updateQuality($this->item->quality, $this->item->sellIn);
        $this->updateSellIn();
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