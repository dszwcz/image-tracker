<?php

declare(strict_types=1);

namespace App\Factory;

use App\Model\TrackedImage;
use App\Model\TrackedImageInterface;

/**
 * Class TrackedImageFactory
 * @package App\Factory
 */
final class TrackedImageFactory implements TrackedImageFactoryInterface
{
    /**
     * @inheritdoc
     */
    public function create(string $source, string $hash): TrackedImageInterface
    {
        $trackedImage = new TrackedImage();
        $trackedImage->setSource($source);
        $trackedImage->setHash($hash);

        return $trackedImage;
    }
}

