<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\TrackedImageInterface;

/**
 * Interface ImageProviderInterface
 * @package App\Tracker
 */
interface ImageProviderInterface
{
    /**
     * @param string $source
     * @return TrackedImageInterface|null
     */
    public function getBySource(string $source): ?TrackedImageInterface;
}
