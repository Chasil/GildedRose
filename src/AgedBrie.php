<?php

namespace GildedRose;

class AgedBrie extends ItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new AgedBrieUpdater();
    }
}