<?php

namespace GildedRose;

class LegendaryItemUpdater implements Updateable
{
    public function update(): void
    {
        if ($this->quality < 50) {
            $this->quality += 1;
        }
    }
}