<?php

namespace GildedRose;

class BackstageItemUpdater implements Updateable
{
    public function update(): void
    {
        if ($this->quality < 50) {
            $this->quality += 1;

            if ($this->sellIn < 11) {
                if ($this->quality < 50) {
                    $this->quality += 1;
                }
            }
            if ($this->sellIn < 6) {
                if ($this->quality < 50) {
                    $this->quality += 1;
                }
            }
        }

        if($this->sellIn < 0) {
            $this->quality = $this->quality - $this->quality;
        }

        $this->sellIn -= 1;
    }
}