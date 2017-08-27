<?php

namespace Minerva\AppBundle\Controller;

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
     *
     * @param Request $request
     * @return array
     */
    public function rosterAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/about", name="minerva_app_content_about")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function aboutAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/progress", name="minerva_app_content_progress")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function progressAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/apply", name="minerva_app_content_apply")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function applyAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/twitch", name="minerva_app_content_twitch")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function twitchAction(Request $request)
    {
        return [];
    }

    /**
     * @Route("/bio", name="minerva_app_content_bio")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function bioAction(Request $request)
    {
        return [];
    }
}
