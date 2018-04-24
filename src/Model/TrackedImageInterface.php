<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Interface TrackedImageInterface
 * @package App\Model
 */
interface TrackedImageInterface
{
    /**
     * @return string
     */
    public function getSource(): string;

    /**
     * @param string $source
     */
    public function setSource(string $source): void;

    /**
     * @return string
     */
    public function getHash(): string;

    /**
     * @param string $hash
     */
    public function setHash(string $hash): void;
}
