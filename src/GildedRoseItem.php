<?php

namespace GildedRose;

class GildedRoseItem implements Updatable
{
    protected GildedRoseItemUpdater $updater;
    public function __construct(protected Item $item)
    {
        $this->updater = $this->createUpdater();
    }

    final public function update(): void
    {
        $this->updater->update();
    }

    public function createUpdater(): GildedRoseItemUpdater
    {
        return new GildedRoseItemUpdater($this->item);
    }
}