<?php

namespace GildedRose;

class ConjuredItemUpdater implements Updateable
{
    private const UPDATER_NAMES = 'Conjured';

    public function update(): void
    {
        if ($this->name === self::UPDATER_NAMES) {
            $this->updateQuality();
            $this->sellIn -= 1;
        }
    }

    private function updateQuality(): void
    {
        if ($this->sellIn < 0) {
            if ($this->quality > 0) {
                $this->quality -= 1;
            }
        } else {
            if ($this->quality > 0) {
                $this->quality -= 2;
            }
        }
    }
}