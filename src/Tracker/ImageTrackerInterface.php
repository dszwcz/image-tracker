<?php

declare(strict_types=1);

namespace App\Tracker;

/**
 * Interface ImageTrackerInterface
 * @package App\Tracker
 */
interface ImageTrackerInterface
{
    /**
     * @param string $source
     * @return ImageComparisonInterface
     */
    public function track(string $source): ImageComparisonInterface;
}