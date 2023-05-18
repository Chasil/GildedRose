<?php

namespace GildedRose;

class AgedBrieUpdater implements Updateable
{
    private const UPDATER_NAMES = 'Aged Brie';

    public function update(): void
    {
        if ($this->name === self::UPDATER_NAMES) {
            $this->updateQuality();
            $this->sellIn -= 1;
        }
    }

    private function updateQuality(): void
    {
        if ($this->quality < 50) {
            $this->quality += 1;
        }
    }
}