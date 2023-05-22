<?php

namespace GildedRose;

class AgedBrie extends GildedRoseItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new AgedBrieUpdater();
    }
}