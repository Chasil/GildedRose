<?php

namespace GildedRose;

class AgedBrie extends ItemUpdater
{
    public function GetUpdateableItem(): Updateable
    {
        return new AgedBrieUpdater();
    }
}