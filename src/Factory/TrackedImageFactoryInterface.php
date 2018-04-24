<?php

declare(strict_types=1);

namespace App\Factory;

use App\Model\TrackedImageInterface;

/**
 * Interface TrackedImageFactoryInterface
 * @package App\Factory
 */
interface TrackedImageFactoryInterface
{
    /**
     * @param string $source
     * @param string $hash
     * @return TrackedImageInterface
     */
    public function create(string $source, string $hash): TrackedImageInterface;
}
