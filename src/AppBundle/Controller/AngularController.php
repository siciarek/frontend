<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/angular")
 */
class AngularController extends Controller
{

    /**
     * @Route("/index", name="angular.index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return [];
    }
}
