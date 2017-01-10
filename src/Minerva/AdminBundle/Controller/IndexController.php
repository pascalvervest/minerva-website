<?php

namespace Minerva\AdminBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * IndexController
 *
 * @package Minerva\AdminBundle\Controller
 * @author Pascal Vervest <pascalvervest@gmail.com>
 */
class IndexController extends Controller
{
    /**
     * @Route("/", name="minerva_admin_index_index")
     * @Template
     *
     * @param Request $request
     * @return array
     */
    public function indexAction(Request $request)
    {
        return [];
    }
}
