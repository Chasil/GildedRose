<?php

namespace GildedRose;

class ConjuredItemUpdater implements Updateable
{
    public function update(): void
    {
        if($this->quality > 0) {
            $this->quality -= 2;
        }

        if ($this->sellIn < 0) {
            if ($this->quality > 0) {
                $this->quality -= 1;
            }
        }

        $this->sellIn -= 1;
    }
}