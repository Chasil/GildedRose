<?php

namespace GildedRose;

abstract class GildedRoseItem implements Updatable
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

    public abstract function createUpdater(): GildedRoseItemUpdater;
}