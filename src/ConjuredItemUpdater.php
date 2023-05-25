<?php

namespace GildedRose;

class ConjuredItemUpdater extends GildedRoseItemUpdater
{
    public function update(): void
    {
        $this->updateQuality();
        $this->item->sellIn -= 1;
    }

    private function updateQuality(): void
    {
        if ($this->item->sellIn < 0) {
            if ($this->item->quality > 0) {
                $this->item->quality -= 1;
            }
        } else {
            if ($this->item->quality > 0) {
                $this->item->quality -= 2;
            }
        }
    }
}