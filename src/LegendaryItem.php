<?php

namespace GildedRose;

class LegendaryItem extends ItemUpdater
{
    public function GetUpdateableItem(): Updateable
    {
        return new LegendaryItemUpdateor();
    }
}