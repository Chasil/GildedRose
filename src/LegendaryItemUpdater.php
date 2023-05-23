<?php

namespace GildedRose;

class LegendaryItemUpdater implements Updateable
{
    protected Item $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this->updateQuality();
    }

    private function updateQuality(): void
    {
        if ($this->item->quality < 50) {
            $this->item->quality += 1;
        }
    }
}