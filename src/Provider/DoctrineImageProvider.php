<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\TrackedImageInterface;

/**
 * Class DoctrineImageProvider
 * @package App\Tracker
 */
final class DoctrineImageProvider
{
    private $repository;

    public function __construct($repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function getBySource(string $source): ?TrackedImageInterface
    {
    }
}
