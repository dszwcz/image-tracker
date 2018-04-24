<?php

declare(strict_types=1);

namespace App\Controller;

use App\Tracker\ImageTrackerInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class HomeController
 * @package App\Controller
 */
final class HomeController
{
    /**
     * @var Environment $twig
     */
    private $twig;
    /**
     * @var ImageTrackerInterface $tracker
     */
    private $tracker;

    /**
     * HomeController constructor.
     * @param Environment $twig
     * @param ImageTrackerInterface $tracker
     */
    public function __construct(Environment $twig, ImageTrackerInterface $tracker)
    {
        $this->twig = $twig;
        $this->tracker = $tracker;
    }

    /**
     * @return Response
     */
    public function index()
    {
        $tracker = $this->tracker->track('xyz');
        $template = $this->twig->render('home/index.html.twig');

        return new Response($template);
    }
}