<?php

namespace GildedRose;

class GildedItemFunctions
{
    private const MIN_QUALITY = 0;
    private const MAX_QUALITY = 50;

    public function updateQuality(int $quality, ?int $sellIn): int
    {
        if (!$this->isQualityValueValid($quality)) {
            return $quality;
        }
        if (!$this->isQualityValueValid($quality, true)) {
            return $quality;
        }
        if (!($sellIn < 11)) {
            return $quality;
        }

        $quality = $this->increaseQualityBy($quality, 1);

        return ($sellIn < 6)
            ? $this->increaseQualityBy($quality, 2)
            : $this->increaseQualityBy($quality, 1);
    }

    private function isQualityValueValid(int $quality, bool $inRange = false): bool
    {
        return ($inRange) ? $quality >= self::MIN_QUALITY && $quality <= self::MAX_QUALITY : $quality < self::MAX_QUALITY;
    }

    private function increaseQualityBy(int $quality, int $increaseValue): int
    {
        return $quality + $increaseValue;
    }
}