<?php

namespace GildedRose;

class AgedBrieUpdater implements Updateable
{
    private const UPDATER_NAMES = 'Aged Brie';
    protected string $name;
    protected int $quality, $sellIn;

    public function __construct($name, $quality, $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

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