<?php

namespace GildedRose;

class LegendaryItemUpdateor implements ItemConnector
{
    private int $quality, $sellIn;
    private string $name;

    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    public function update(): void
    {

    }
}