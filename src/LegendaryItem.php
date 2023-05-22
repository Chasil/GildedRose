<?php

namespace GildedRose;

class LegendaryItem extends GildedRoseItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new LegendaryItemUpdater();
    }
}