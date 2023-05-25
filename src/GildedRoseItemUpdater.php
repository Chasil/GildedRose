<?php

namespace GildedRose;

abstract class GildedRoseItemUpdater
{
    public function __construct(protected Item $item)
    {
    }

    public abstract function update(): void;
}