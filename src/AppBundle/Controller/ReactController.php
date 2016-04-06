<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("/react")
 */
class ReactController extends Controller
{

    /**
     * @Route("/index", name="react.index")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        return [];
    }
}
