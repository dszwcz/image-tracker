<?php

declare(strict_types=1);

namespace App\Provider;

use App\Factory\TrackedImageFactoryInterface;
use App\Model\TrackedImageInterface;

/**
 * Class WebStreamImageProvider
 * @package App\Tracker
 */
final class WebStreamImageProvider implements ImageProviderInterface
{
    /**
     * @var TrackedImageFactoryInterface $imageFactory
     */
    private $imageFactory;

    /**
     * WebStreamImageProvider constructor.
     * @param TrackedImageFactoryInterface $imageFactory
     */
    public function __construct(TrackedImageFactoryInterface $imageFactory)
    {
        $this->imageFactory = $imageFactory;
    }

    /**
     * @inheritdoc
     */
    public function getBySource(string $source): TrackedImageInterface
    {
        $stream = file_get_contents($source);
        $hash = md5($stream);

        return $this->imageFactory->create($source, $hash);
    }
}
