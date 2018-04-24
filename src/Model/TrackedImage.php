<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Class TrackedImage
 * @package App\Model
 */
class TrackedImage implements TrackedImageInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string $source
     */
    private $source;

    /**
     * @var string $hash
     */
    private $hash;

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * @inheritdoc
     */
    public function setSource(string $source): void
    {
        $this->source = $source;
    }

    /**
     * @inheritdoc
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @inheritdoc
     */
    public function setHash(string $hash): void
    {
        $this->hash = $hash;
    }
}

