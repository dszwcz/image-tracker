<?php

declare(strict_types=1);

namespace App\Tracker;

use App\Model\TrackedImageInterface;

/**
 * Class ImageComparison
 * @package App\Tracker
 */
class ImageComparison implements ImageComparisonInterface
{
    /**
     * @var TrackedImageInterface
     */
    private $originImage;

    /**
     * @var TrackedImageInterface
     */
    private $savedImage;

    /**
     * ImageComparison constructor.
     * @param TrackedImageInterface $originImage
     * @param TrackedImageInterface $savedImage
     */
    public function __construct(
        TrackedImageInterface $originImage,
        TrackedImageInterface $savedImage
    ) {
        $this->originImage = $originImage;
        $this->savedImage = $savedImage;
    }

    /**
     * @inheritdoc
     */
    public function getComparedImage(): TrackedImageInterface
    {
        return $this->originImage;
    }

    /**
     * @inheritdoc
     */
    public function isNeverTracked(): bool
    {
    }

    /**
     * @inheritdoc
     */
    public function isChanged(): bool
    {
    }

    /**
     * @inheritdoc
     */
    public function isUnchanged(): bool
    {
    }
}
