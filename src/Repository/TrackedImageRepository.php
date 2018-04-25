<?php

declare(strict_types=1);

namespace App\Repository;
use App\Model\TrackedImageInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use App\Model\TrackedImage;

/**
 * Class TrackedImageRepository
 * @package App\Repository
 */
final class TrackedImageRepository implements TrackedImageRepositoryInterface
{
    /**
     * @var EntityRepository
     */
    private $repository;

    public function __construct(EntityManager $entityManager)
    {
        $this->repository = $entityManager->getRepository(TrackedImage::class);
    }

    /**
     * @inheritdoc
     */
    public function findBySource(string $source): ?TrackedImageInterface
    {
        return $this->repository->createQueryBuilder('o')
            ->where('o.source = :source')
            ->setParameter('source', $source)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
