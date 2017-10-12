<?php

declare(strict_types=1);

namespace Minerva\AppBundle\Controller;

use Minerva\AppBundle\Entity\Application;
use Minerva\AppBundle\Form\ApplicationType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * ContentController
 *
 * @package Minerva\AppBundle\Controller
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class ContentController extends Controller
{
    /**
     * @Route("/roster", name="minerva_app_content_roster")
     * @Template
     */
    public function rosterAction(Request $request): array
    {
        return [];
    }

    /**
     * @Route("/about", name="minerva_app_content_about")
     * @Template
     */
    public function aboutAction(Request $request): array
    {
        return [];
    }

    /**
     * @Route("/progress", name="minerva_app_content_progress")
     * @Template
     */
    public function progressAction(Request $request): array
    {
        return [];
    }

    /**
     * @Route("/apply", name="minerva_app_content_apply")
     * @Template
     */
    public function applyAction(Request $request): array
    {
        /** @var Application $application */
        $application = new Application();

        /** @var ApplicationType $form */
        $form = $this->createForm(ApplicationType::class, $application);

        // Handle form submission
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $application = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($application);
            $em->flush();
        }

        return [
            'form' => $form->createView(),
        ];
    }

    /**
     * @Route("/twitch", name="minerva_app_content_twitch")
     * @Template
     */
    public function twitchAction(Request $request): array
    {
        return [];
    }

    /**
     * @Route("/bio", name="minerva_app_content_bio")
     * @Template
     */
    public function bioAction(Request $request): array
    {
        return [];
    }
}

