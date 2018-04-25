<?php

declare(strict_types=1);

namespace App\Controller;

use App\Tracker\ImageComparisonInterface;
use App\Tracker\ImageTrackerInterface;
use App\Tracker\TrackedImageMessage;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\EventDispatcher\GenericEvent;

/**
 * Class HomeController
 * @package App\Controller
 */
final class HomeController extends Controller
{
    /**
     * @var ImageTrackerInterface $tracker
     */
    private $tracker;

    /**
     * HomeController constructor.
     * @param ImageTrackerInterface $tracker
     */
    public function __construct(ImageTrackerInterface $tracker) {
        $this->tracker = $tracker;
    }

    /**
     * @return Response
     */
    public function index(Request $request): Response
    {
        $message = 'Please enter the image URL for tracking.';

        $form = $this->createMyForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            /** @var ImageComparisonInterface $trackingComparison */
            $trackingComparison = $this->tracker->track($data['source']);

            $trackingMessage = new TrackedImageMessage($trackingComparison);
            $message = $trackingMessage->getMessage();

            $event = new GenericEvent($trackingComparison);
            $this->get('event_dispatcher')->dispatch('image_tracker.tracked', $event);
        }

        return $this->render('home/index.html.twig', [
            'message' => $message,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @return Form
     */
    private function createMyForm(): Form
    {
        return $this->createFormBuilder()
            ->add('source', UrlType::class)
            ->add('track', SubmitType::class)
            ->getForm()
        ;
    }
}