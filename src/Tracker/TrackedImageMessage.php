<?php

declare(strict_types=1);

namespace App\Tracker;

/**
 * Class TrackedImageMessage
 * @package App\Tracker
 */
final class TrackedImageMessage
{
    /**
     * @var ImageComparisonInterface $image
     */
    private $image;
    /**
     * @var string $message
     */
    private $message;

    /**
     * TrackedImageMessage constructor.
     * @param ImageComparisonInterface $image
     */
    public function __construct(ImageComparisonInterface $image)
    {
        $this->image = $image;
        $this->setMatchingMessage();
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    private function setMatchingMessage(): void
    {
        if ($this->image->isNotFound()) {
            $this->message = 'The image you are looking for does not exist.';
        } elseif ($this->image->isNeverTracked()) {
            $this->message = 'I have never seen this image before.';
        } elseif ($this->image->isDropped()) {
            $this->message = 'It looks like the image has been dropped.';
        } elseif ($this->image->isChanged()) {
            $this->message = 'This is not the same image.';
        } elseif ($this->image->isUnchanged()) {
            $this->message = 'This image is still unchanged.';
        } else {
            $this->message = 'I have no idea what\'s going on';
        }
    }
}

