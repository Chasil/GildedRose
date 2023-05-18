<?php

namespace GildedRose;

class AgedBrieUpdater implements Updateable
{
    public function update(): void
    {
        if ($this->quality < 50) {
            $this->quality += 1;
        }

        $this->sellIn -= 1;
    }
}