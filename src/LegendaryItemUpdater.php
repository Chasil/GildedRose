<?php

namespace GildedRose;

class LegendaryItemUpdater implements Updateable
{
    private const UPDATER_NAMES = ['Sulfuras, Hand of Ragnaros'];

    public function update(): void
    {
        if (in_array($this->name, self::UPDATER_NAMES)) {
            $this->updateQuality();
        }
    }

    private function updateQuality(): void
    {
        if ($this->quality < 50) {
            $this->quality += 1;
        }
    }
}