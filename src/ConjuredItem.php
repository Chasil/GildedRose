<?php

namespace GildedRose;

class ConjuredItem extends ItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new ConjuredItemUpdater();
    }
}