<?php

namespace GildedRose;

class AgedBrieUpdater extends GildedRoseItemUpdater
{
    public function update(): void
    {
        $this->updateQuality();
        $this->item->sellIn -= 1;
    }

    private function updateQuality(): void
    {
        if ($this->item->quality < 50) {
            $this->item->quality += 1;
        }
    }
}