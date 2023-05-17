<?php

namespace GildedRose;

class LegendaryItem extends ItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new LegendaryItemUpdater();
    }
}