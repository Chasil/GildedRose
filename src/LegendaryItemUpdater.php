<?php

namespace GildedRose;

class LegendaryItemUpdater implements Updateable
{
    private const UPDATER_NAMES = ['Sulfuras, Hand of Ragnaros'];
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