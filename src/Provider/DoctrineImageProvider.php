<?php

declare(strict_types=1);

namespace App\Provider;

use App\Model\TrackedImageInterface;
use App\Repository\TrackedImageRepositoryInterface;

/**
 * Class DoctrineImageProvider
 * @package App\Tracker
 */
final class DoctrineImageProvider implements ImageProviderInterface
{
    /**
     * @var TrackedImageRepositoryInterface $repository
     */
    private $repository;

    public function __construct(TrackedImageRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function getBySource(string $source): ?TrackedImageInterface
    {
        return $this->repository->findBySource($source);
    }
}
