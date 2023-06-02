<?php

namespace GildedRose;

class GildedItemFunctions
{
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    public function updateQuality(int $quality, ?int $sellIn): int
    {
        if ($this->isQualityValueValid($quality)) {
            if ($this->isQualityNotMaxed($quality)) {
                $quality = $this->increaseQualityBy($quality, 1);
                if ($sellIn < 11) {
                    if ($this->isQualityNotMaxed($quality)) {
                        $quality = ($sellIn < 6)
                            ? $this->increaseQualityBy($quality, 2)
                            : $this->increaseQualityBy($quality, 1);
                    }
                }
            }
        }

        return $quality;
    }

    private function isQualityValueValid(int $quality): bool
    {
        return $quality >= self::MIN_QUALITY && $quality <= self::MAX_QUALITY;
    }

    private function isQualityNotMaxed(int $quality): bool
    {
        return $quality < self::MAX_QUALITY;
    }

    private function increaseQualityBy(int $quality, int $increaseValue): int
    {
        return $quality + $increaseValue;
    }
}