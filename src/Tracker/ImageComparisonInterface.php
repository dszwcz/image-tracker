<?php

declare(strict_types=1);

namespace App\Tracker;

use App\Model\TrackedImageInterface;

/**
 * Interface ImageComparisonInterface
 * @package App\Tracker
 */
interface ImageComparisonInterface
{
    /**
     * @return TrackedImageInterface|null
     */
    public function getComparedImage(): ?TrackedImageInterface;

    /**
     * @return bool
     */
    public function isNotFound(): bool;

    /**
     * @return bool
     */
    public function isNeverTracked(): bool;

    /**
     * @return bool
     */
    public function isDropped(): bool;

    /**
     * @return bool
     */
    public function isChanged(): bool;

    /**
     * @return bool
     */
    public function isUnchanged(): bool;
}
