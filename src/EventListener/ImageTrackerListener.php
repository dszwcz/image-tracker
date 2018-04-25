<?php

declare(strict_types=1);

namespace App\EventListener;

use App\Tracker\ImageComparisonInterface;
use Doctrine\ORM\EntityManager;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class ImageTrackerListener
 * @package App\EventListener
 */
final class ImageTrackerListener
{
    /**
     * @var EntityManager $entityManager
     */
    private $entityManager;

    /**
     * ImageTrackerListener constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param GenericEvent $event
     */
    public function onNeverTracked(GenericEvent $event): void
    {
        /** @var ImageComparisonInterface $imageComparison */
        $imageComparison = $event->getSubject();

        if ($imageComparison->isNeverTracked()) {
            $this->entityManager->persist($imageComparison->getComparedImage());
            $this->entityManager->flush();
        }
    }

    public function onDropped(GenericEvent $event): void
    {
        /** @var ImageComparisonInterface $imageComparison */
        $imageComparison = $event->getSubject();

        if ($imageComparison->isDropped()) {
            $this->entityManager->remove($imageComparison->getComparedImage());
            $this->entityManager->flush();
        }

    }
}
