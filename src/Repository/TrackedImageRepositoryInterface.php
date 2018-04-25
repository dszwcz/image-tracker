<?php

declare(strict_types=1);

namespace App\Repository;

use App\Model\TrackedImageInterface;

/**
 * Interface TrackedImageRepositoryInterface
 * @package App\Repository
 */
interface TrackedImageRepositoryInterface
{
    /**
     * @param string $source
     * @return TrackedImageInterface|null
     */
    public function findBySource(string $source): ?TrackedImageInterface;
}
