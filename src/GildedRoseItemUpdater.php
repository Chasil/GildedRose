<?php

namespace GildedRose;

abstract class GildedRoseItemUpdater
{
    protected const MIN_QUALITY = 0;
    protected const MAX_QUALITY = 50;

    public function __construct(protected Item $item)
    {
    }

    public abstract function update(): void;

    protected function increaseQualityBy(int $quality, int $increaseValue): int
    {
        return $quality + $increaseValue;
    }
}