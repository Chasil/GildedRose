<?php

namespace GildedRose;

class AgedBrie extends GildedRoseItemUpdater
{
    private int $quality, $sellIn;
    private string $name;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function GetGildedRoseItem(): Item
    {
        return new AgedBrieUpdateor($this->name, $this->quality, $this->sellIn);
    }
}