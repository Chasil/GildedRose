<?php

namespace GildedRose;

class BackstageItem extends ItemUpdater
{
    public function getUpdateableItem(): Updateable
    {
        return new BackstageItemUpdater();
    }
}