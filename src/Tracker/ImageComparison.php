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
     * @var TrackedImageInterface $originImage
     */
    private $originImage;

    /**
     * @var TrackedImageInterface $savedImage
     */
    private $savedImage;

    /**
     * ImageComparison constructor.
     * @param TrackedImageInterface|null $originImage
     * @param TrackedImageInterface|null $savedImage
     */
    public function __construct(
        ?TrackedImageInterface $originImage,
        ?TrackedImageInterface $savedImage
    ) {
        $this->originImage = $originImage;
        $this->savedImage = $savedImage;
    }

    /**
     * @inheritdoc
     */
    public function getComparedImage(): ?TrackedImageInterface
    {
        return $this->originImage ?: $this->savedImage;
    }

    /**
     * @inheritdoc
     */
    public function isNotFound(): bool
    {
        return
            null === $this->originImage &&
            null === $this->savedImage;
    }

    /**
     * @inheritdoc
     */
    public function isNeverTracked(): bool
    {
        return
            null !== $this->originImage &&
            null === $this->savedImage;
    }

    /**
     * @inheritdoc
     */
    public function isDropped(): bool
    {
        return
            null === $this->originImage &&
            null !== $this->savedImage;
    }

    /**
     * @inheritdoc
     */
    public function isChanged(): bool
    {
        return
            null !== $this->originImage &&
            null !== $this->savedImage &&
            $this->originImage->getHash() !== $this->savedImage->getHash();
    }

    /**
     * @inheritdoc
     */
    public function isUnchanged(): bool
    {
        return
            null !== $this->originImage &&
            null !== $this->savedImage &&
            $this->originImage->getHash() === $this->savedImage->getHash();
    }
}
