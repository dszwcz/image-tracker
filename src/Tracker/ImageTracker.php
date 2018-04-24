<?php

declare(strict_types=1);

namespace App\Tracker;

use App\Provider\ImageProviderInterface;

/**
 * Class ImageTracker
 * @package App\Tracker
 */
final class ImageTracker implements ImageTrackerInterface
{
    /**
     * @var ImageProviderInterface
     */
    private $originImageProvider;
    /**
     * @var ImageProviderInterface
     */
    private $savedImageProvider;

    /**
     * ImageTracker constructor.
     * @param ImageProviderInterface $originImageProvider
     * @param ImageProviderInterface $savedImageProvider
     */
    public function __construct(
        ImageProviderInterface $originImageProvider,
        ImageProviderInterface $savedImageProvider
    ) {
        $this->originImageProvider = $originImageProvider;
        $this->savedImageProvider = $savedImageProvider;
    }

    /**
     * @inheritdoc
     */
    public function track(string $source): ImageComparisonInterface
    {
        $originImage = $this->originImageProvider->getBySource($source);
        $savedImage = $this->savedImageProvider->getBySource($source);

        return new ImageComparison($originImage, $savedImage);
    }
}